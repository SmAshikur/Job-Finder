<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
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
    return "ok";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('job', JobController::class);
//Route::get('post/job',[JobController::class,'postJob']);
Route::resource('company', CompanyController::class);

Route::resource('profile', ProfileController::class);
Route::Post('profile/update',[ProfileController::class,'updateAvatar']);
Route::get('avatar/get',[ProfileController::class,'getAvatar']);
Route::get('manike',[CompanyController::class,'getCom']);
Route::Post('details/update',[ProfileController::class,'updatedetails']);
Route::get('details/get',[ProfileController::class,'getdetails']);
Route::Post('coverLetter/update',[ProfileController::class,'updateCoverLetter']);
Route::Post('resume/update',[ProfileController::class,'updateResume']);

Route::get('king',[CompanyController::class,'king'])->name('company.register');
Route::post('king/ping',[CompanyController::class,'kingg']);
Route::Post('bal/update',[CompanyController::class,'updatedetails']);
Route::Post('cover/update',[CompanyController::class,'updateCover']);
Route::Post('logo/update',[CompanyController::class,'updateLogo']);

