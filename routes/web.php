<?php

use App\Http\Controllers\CompanyController;
use App\Models\CompanyModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $companies = CompanyModel::paginate(1);
    return view('welcome', compact("companies"));
});

Route::get('/view/{company}', function ($company) {
    $company = CompanyModel::where("slag",$company)->first() ?? abort(404);
    return view('company', compact("company"));
})->name("company");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $companies = CompanyModel::get();
        return view('dashboard' , compact("companies"));
    })->name('dashboard');
    Route::resource("company",CompanyController::class);
});
