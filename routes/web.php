<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminAppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users\AppointmentController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::post('update-profile-info', [AdminController::class, 'updateInfo'])->name('adminUpdateInfo');

    Route::get('forapproval', [AdminAppController::class, 'index'])->name('admin.forapproval');
    Route::get('appointmentlist', [AdminAppController::class, 'appointmentlist'])->name('admin.appointmentlist');
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
    Route::get('appointment', [AppointmentController::class, 'index'])->name('user.appointment');
    Route::post('appointment', [AppointmentController::class, 'store'])->name('user.CreateAppointment');
    Route::get('appointment-list', [AppointmentController::class, 'listOfAppointment'])->name('user.listofappointment');
    Route::post('insertpartialpayment', [AppointmentController::class, 'InsertPartialPayment'])->name('user.insertpartialpayment');

    //AJAX
    Route::GET('getPrice/{id}', [AppointmentController::class, 'getPrice']);
    Route::GET('getAmount/{id}', [AppointmentController::class, 'getAmount']);
    Route::POST('getAmount', [AppointmentController::class, 'getAmount'])->name('getAmount');
});
