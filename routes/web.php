<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\Auth\UpdatePasswordController;

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

//Welcome Page
Route::get('/', function () {
    return view('welcome');
});


// Home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

//Admin
Route::get('/admin/view/profile/{id}', [UserController::class, 'showAdminProfile'])->name('admin.profile.show');
Route::get('/admin/edit/{id}', [UserController::class, 'editAdmin'])->name('admin.edit');
Route::post('admin/update', [UserController::class, 'updateAdmin'])->name('admin.update');
Route::get('/admin/password/edit/{id}', [UpdatePasswordController::class, 'edit'])->name('admin.password.edit');
Route::post('/admin/password/edit/{id}', [UpdatePasswordController::class, 'update'])->name('admin.password.update');

//Information about COVID-19
Route::get('/information/add', [InformationController::class, 'create'])->name('information.create');
Route::post('/information/add', [InformationController::class, 'store'])->name('information.store');
Route::get('/information/view/list', [InformationController::class, 'getInfoList'])->name('information.list');
Route::get('/information/view/info/{id}', [InformationController::class, 'showInfo'])->name('information.info');
Route::get('/information/edit/{id}', [InformationController::class, 'editInfo'])->name('information.edit');
Route::post('/information/update', [InformationController::class, 'updateInfo'])->name('information.update');
Route::delete('/information/delete/{id}', [InformationController::class, 'destroy'])->name('information.delete');

//Advice
Route::get('/advice/add', [AdviceController::class, 'create'])->name('advice.create');
Route::post('/advice/add', [AdviceController::class, 'store'])->name('advice.store');
Route::get('/advice/view/list', [AdviceController::class, 'getAdviceList'])->name('advice.list');
Route::get('/advice/view/info/{id}', [AdviceController::class, 'showAdvice'])->name('advice.info');
Route::get('/advice/edit/{id}', [AdviceController::class, 'editAdvice'])->name('advice.edit');
Route::post('/advice/update', [AdviceController::class, 'updateAdvice'])->name('advice.update');
Route::delete('/advice/delete/{id}', [AdviceController::class, 'destroy'])->name('advice.delete');

//Consultant List
Route::get('/consultant/add', [ConsultantController ::class, 'create'])->name('consultant.create');
Route::post('/consultant/add', [ConsultantController::class, 'store'])->name('consultant.store');
Route::get('/consultant/view/list', [ConsultantController::class, 'getConsultantList'])->name('consultant.list');
Route::get('/consultant/view/info/{id}', [ConsultantController::class, 'showConsultant'])->name('consultant.info');
Route::get('/consultant/edit/{id}', [ConsultantController::class, 'editConsultant'])->name('consultant.edit');
Route::post('/consultant/update', [ConsultantController::class, 'updateConsultant'])->name('consultant.update');
Route::delete('/consultant/delete/{id}', [ConsultantController::class, 'destroy'])->name('consultant.delete');

//Activity
Route::get('/activity/add', [ActivityController::class, 'create'])->name('activity.create');
Route::post('/activity/add', [ActivityController::class, 'store'])->name('activity.store');
Route::get('/activity/view/list', [ActivityController::class, 'getActivityList'])->name('activity.list');
Route::get('/activity/view/info/{id}', [ActivityController::class, 'showActivity'])->name('activity.info');
Route::get('/activity/edit/{id}', [ActivityController::class, 'editActivity'])->name('activity.edit');
Route::post('/activity/update', [ActivityController::class, 'updateActivity'])->name('activity.update');
Route::delete('/activity/delete/{id}', [ActivityController::class, 'destroy'])->name('activity.delete');

//Music
Route::get('/music/add', [MusicController::class, 'create'])->name('music.create');
Route::post('/music/add', [MusicController::class, 'store'])->name('music.store');
Route::get('/music/view/list', [MusicController::class, 'getMusicList'])->name('music.list');
Route::get('/music/view/info/{id}', [MusicController::class, 'showMusic'])->name('music.info');
Route::get('/music/edit/{id}', [MusicController::class, 'editMusic'])->name('music.edit');
Route::post('/music/update', [MusicController::class, 'updateMusic'])->name('music.update');
Route::delete('/music/delete/{id}', [MusicController::class, 'destroy'])->name('music.delete');

// Quran
Route::get('/quran', [QuranController::class, 'index'])->name('quran'); 
Route::get('/quran/{id}', [QuranController::class, 'indexID'])->name('quran.id');

// Update password
Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
Route::post('password/edit', [UpdatePasswordController::class, 'update'])->name('password.update');


