<?php

namespace App\Http\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class SystemHelper
{

    /**
     * return SystemHelper::error("First Helper Completed","success","test.update",['test' => 'hemmy']);
     */
    public static function error($sms, $type = "success", $url = null, $url_parameter = [], $data = [])
    {
        if (Request::is('api*')) {
            return self::response($data, $sms, $type == "success" ? true : false, 200, 0);
        }
        if (session()->has('flash.url')) {
            session()->flash(
                'flash.banner',
                session('flash.banner', $sms)
            );
            session()->flash('flash.bannerStyle', session('flash.bannerStyle', $type));
        } else {
            session()->flash('flash.banner', $sms);
            session()->flash('flash.bannerStyle', $type);
        }
        if (request()->has('redirect_to') && !$url) {
            $url = request()->input('redirect_to', null);
            $url_parameter = request()->input('redirect_parameters', []);
        }
        if (!Route::has($url)) {
            return redirect()->back();
        }
        return redirect()->route($url, $url_parameter);
    }

    public static function recentry_created($collection, $sms = null, $url = null, $url_parameter = [], $data = [])
    {
        if ($collection->wasRecentlyCreated) {
            return SystemHelper::error($sms ?? "Created Successfully!!", "success", $url, $url_parameter, $data);
        }
        return SystemHelper::error($sms ?? "Failed to Create!!", "danger", $url, $url_parameter, $data);
    }

    public static function recentry_updated($state, $sms = null, $url = null, $url_parameter = [], $data = [])
    {
        if ($state) {
            return SystemHelper::error($sms ?? "Updated Successfully!!", "success", $url, $url_parameter, $data);
        }
        return SystemHelper::error($sms ?? "Failed to Update!!", "danger", $url, $url_parameter, $data);
    }

    public static function money_viewer($money, $decimal = 2, $dec_point = '.', $thousands_sep = ',')
    {
        if (isset($_GET['noseparator'])) {
            $thousands_sep = '';
        }
        if (is_numeric($money)) {
            if ($money < 0) {
                return "(" . number_format((-1) * $money, $decimal, $dec_point, $thousands_sep) . ")";
            }
            return number_format($money, $decimal, $dec_point, $thousands_sep);
        }
        return $money;
    }

    public static function upload_file($file, $path = "uploads")
    {
        if (request()->file($file)) {
            if (is_array(request()->file($file))) {
                $i = 0;
                $fileName = [];
                foreach (request()->file($file) as $singleFile) {
                    $file_ = self::remove_space(time() . $i . '_' . $singleFile->getClientOriginalName());
                    $singleFile->storeAs($path, $file_, 'public');
                    $fileName[] = $path . '/' . $file_;
                    $i++;
                }
                return $fileName;
            } else {
                $file_ = self::remove_space(time() . '_' . request()->file($file)->getClientOriginalName());
                request()->file($file)->storeAs($path, $file_, 'public');
                $fileName = $path . '/' . $file_;
                return $fileName;
            }
        }
        return null;
    }

    public static function remove_space($string)
    {
        return str_replace(' ', '', $string);
    }


    public static function getSubjectClassRanks($ranks,$subject,$rank="subject_id",$over="class_id"){
        return SystemHelper::getRanking($ranks,$subject,$rank,$over);
    }

    public static function getRanking($makings,$student_id=null,$rank="student_id",$over="subject_id"){
        $intendedExams = [];
       $checks = [];
       $totalLoopHere = [];
        foreach($makings as $ex => $exams){
            foreach($exams as $exam){
                $intendedExams[$ex][$exam->$rank][$exam->$over] = $exam->mark;
                $intendedExams[$ex][$exam->$rank]['total'] = ($intendedExams[$ex][$exam->$rank]['total'] ??0) + $exam->mark;
                $checks[$exam->$rank] = 1;
            }
            $totalLoopHere[$ex]['count'] = count($exams) / count($checks);
        }
        $res = [];
        

        foreach($intendedExams as $examKey => $intendedExam){
            $students = $intendedExam;
            uasort($students, function($a, $b) {
                return $b['total'] <=> $a['total'];
            });
            $ranks = [];
            $lastStudent = null;
            $rankNo = 1;
            $lastRankNo = $rankNo;
            $lastStudentKey = null;
            foreach($students as $key => $student){
                if(count($ranks)){
                    $ranks[$key] = $rankNo;
                }
                if(($lastStudent['total']??100000000) == $student['total']){
                    $ranks[$key] = $lastRankNo + 0.5;
                    $ranks[$lastStudentKey] = $lastRankNo + 0.5;
                }else{
                    $ranks[$key] = $rankNo;
                    $lastRankNo = $rankNo;
                }
                $rankNo++;
                $lastStudentKey = $key;
                $lastStudent = $student;
            }
            $res[$examKey]['position'] = ($ranks[$student_id]??"N/A") ;
            $res[$examKey]['total'] = (count($ranks));
            $c = $totalLoopHere[$examKey]['count'];
            $t = ($intendedExams[$examKey][$student_id]['total'])??0;
            $res[$examKey]["average"] = round((is_numeric($t) ? $t : 0) /  (is_numeric($c) ? ($c > 0 ? $c : 1) : 1), 2);
        }
        return  $res;
    }

    public static function displayGrades($grades,$orderBy="max_mark",$sort="desc"){
        $grades = $grades;
        uasort($grades, function($a, $b) use($sort,$orderBy) {
            if(strtoupper($sort) == 'DESC'){
                $c = $a;$a = $b;$b = $c;
            }
            return $a[$orderBy] <=> $b[$orderBy];
        });
        return view("school.helper.grades", compact('grades'));
    }

    public static function phone($phone = false, $reverse = false, $key = "phone")
    {
        if (request()->has($key)) {
            request()->merge(
                [
                    $key => '255' . ltrim(request()->input($key), 0),
                ]
            );
        }
        if (strlen($phone) == 9) {
            $phone = "0" . $phone;
        }
        if ($phone && !$reverse) {
            return '0' . ltrim($phone, '255');
        } else if ($phone && $reverse) {
            return '255' . ltrim($phone, '0');
        }
        return $phone;
    }

    public static function initial_generator()
    {
        if (auth()->check()) {
            $school_name = auth()->user()->school_name;
            $split = explode(' ', $school_name, 2);
            if (count($split) > 1) {
                $firstLater     = $split[0][0] ?? 'M';
                $secondLater    = $split[1][0] ?? $firstLater;
            } else {
                $firstLater     = $split[0][0] ?? 'M';
                $secondLater    = $firstLater;
            }
            $code = ucfirst($firstLater) . ucfirst($secondLater);
            return $code;
        }
        return "MJ";
    }

    public static function name_exists($class, $where = [], $sms = "")
    {
        return redirect()->back();
        if (class_exists($class)) {
            if ($class::where($where)->count()) {
                SystemHelper::error($sms, "danger");
                return redirect()->back();
            }
        }
    }


    public static $arrayModels = [];

    public static function navigation($name)
    {
        $navigation = []; //UserRoleModel::roles();
        $web_nav = function ($key) use ($navigation) {
            if (array_key_exists($key, $navigation)) {
                if ($navigation[$key] == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        };
        return $web_nav($name);
    }

    public static function auth_routes()
    {
        if (array_key_exists('auth:api', Route::current()->gatherMiddleware())) {
            return true;
        } else {
            return false;
        }
    }

    public static function attribute()
    {
        $arrayModels = self::$arrayModels;

        $name = Route::currentRouteName();
        $name = explode('.', $name);
        if (count($name)) {
            $name = $name[0];
        } else {
            $name = "";
        }
        if (array_key_exists($name, $arrayModels)) {
            $model = $arrayModels[$name];
            if (method_exists($model, 'scopeAttributes')) {
                return $model::attributes();
            }
        }
        return [];
    }
    public static function response($data = array(), $sms = "success", $status = true, $code = "200", $count = "")
    {
        if ($data == null) {
            $data = array();
        }
        $user = [];
        if (request()->hasHeader('tanobora-token')) {
            // $user = EAuthModel::createToken();
        }
        // $route_name = Route::currentRouteName();
        // $navigation = ResponseHelper::navigation($route_name);
        // $exculuded_array = ['profile'];
        // if(!$navigation && ResponseHelper::auth_routes() && in_array($route_name,$exculuded_array)){
        //     $sms    = "Not authorized to access $route_name please contact system Admin";
        //     $data   = [];
        //     $status = false;
        // }
        // $attributes = self::attribute();
        return response()->json(compact('status', 'sms', 'code', 'data', 'count', 'user'), 200, [], JSON_PRETTY_PRINT)->header('Access-Control-Allow-Origin', '*')->header('Content-Type', 'application/json');
    }
    public static function response_token($data = array(), $sms = "success", $status = true, $code = "200", $token = "", $is_admin = "")
    {
        //$sms .= "  Provide comment is on test";
        // $route_name = Route::currentRouteName();
        // $navigation = ResponseHeleprTrait::navigation($route_name);
        // if(!$navigation && ResponseHeleprTrait::auth_routes()){
        //     $sms    = "Not authorized to access $route_name please contact system Admin";
        //     $data   = [];
        //     $status = false;
        // }
        $attributes = self::attribute();
        return response()->json(compact('status', 'sms', 'code', 'data', 'is_admin', 'token', 'attributes'))->header('Access-Control-Allow-Origin', '*')->header('Content-Type', 'application/json');
    }

    public static function getContent($res)
    {
        return json_decode($res->getContent());
    }

    public static function request_selecom(
        $url,
        $order_id,
        $amount,
        $payer_email,
        $payer_phone,
        $payer_remarks,
        $merchant_remarks = "Vroom",
        $currency = "TZS",
        $action = "create"
    ) {
        $api_secret = env('SELECOM_SECRETE', '8bf8de7e-c956-4bad-b60f-ba72d1d515a7');
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
        $api_key = env('SELECOM_KEY', 'TILL60345584');
        $digest = function () use ($api_secret, $timestamp, $api_key) {
            return md5($timestamp . $api_secret) . sha1(sha1($timestamp . $api_key . $api_secret, true));
        };
        $back =  function () {
            return false;
        };
        $headers = [
            'Content-Type', 'application/json',
            'API_KEY', $api_key,
            'digest', $digest(),
            'request_timestamp', $timestamp
        ];
        // return $url;
        if ($action == "create") {
            $request = json_encode(compact('order_id', 'amount', 'payer_email', 'payer_phone', 'payer_remarks', 'merchant_remarks', 'currency'));
            $back = function () use ($url, $request, $headers) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSLVERSION, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec($ch);
                if (curl_error($ch)) {
                    echo 'error:' . curl_error($ch);
                }
                curl_close($ch);
                return $response;
            };
        }

        if ($action == "status") {
            //return function_exists('curl_version');
            $back = function () use ($url, $headers) {
                $ch = curl_init();
                $arry = [
                    CURLOPT_URL => "https://api.selcommobile.com/v1/paymentCreate",
                    CURLOPT_HTTPAUTH => CURLAUTH_ANY,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_SSLVERSION => 1,
                    CURLOPT_HTTPHEADER => $headers,
                ];
                curl_setopt_array($ch, $arry);
                $response = curl_exec($ch);
                if (curl_error($ch)) {
                    return 'error:' . curl_error($ch);
                }

                // return "hemedi";
                curl_close($ch);
                return $response;
            };
        }
        return $back();
    }
}
