<?php

namespace App\Http\Controllers;

use App\Http\Helpers\SystemHelper;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    //
    public function create()
    {
        return view("company.create");
    }

    public function store(Request $request)
    {
        $file = $this->upload_file("plogo");
        $request->merge([
            'logo' => $file
        ]);
        $company = CompanyModel::create($request->except("_token"));
        return SystemHelper::recentry_created($company,"Created Successfuly!!");
    }

    public function edit($id)
    {
        $company = CompanyModel::where("id",$id)->first() ?? abort(404);
        return view("company.edit", compact("company"));
    }

    public function update(Request $request,$id)
    {
        $company = CompanyModel::where("id",$id)->first() ?? abort(404);
        $file = $this->upload_file("plogo");
        $request->merge([
            'logo' => $file ?? $company->logo,
        ]);
        $updated = CompanyModel::where("id",$id)->update($request->except("_token"));
        return SystemHelper::recentry_updated($updated,"Updated");
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
}
