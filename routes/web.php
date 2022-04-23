<?php

use App\Http\Controllers\Admin\AdminAddProductsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminAppController;
use App\Http\Controllers\Admin\AdminAssignController;
use App\Http\Controllers\Admin\AdminPickupDateandTime;
use App\Http\Controllers\Admin\AdminPendingPaymentController;
use App\Http\Controllers\Admin\AdminWalkinController;

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users\AppointmentController;
use App\Http\Controllers\Users\EcommerceController;


use App\Mail\MailApproval;
use App\Models\appointment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;

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

    Route::get('assign', [AdminAssignController::class, 'index'])->name('admin.assign');

    Route::get('paymenthistory', [AdminAppController::class, 'paymentHistory'])->name('admin.paymenthistory');

   

    //Update

    Route::get('statusUpdate', [AdminAppController::class, 'update'])->name('admin.statusUpdate');
    Route::post('assignEmployee', [AdminAssignController::class, 'update'])->name('admin.assignUpdate');
    Route::post('updateStatus', [AdminAssignController::class, 'updateStatus'])->name('admin.updateStatus');

    //Add Product Controller

    Route::get('indexProduct', [AdminAddProductsController::class, 'index'])->name('admin.indexProduct');
    Route::post('addProduct', [AdminAddProductsController::class, 'store'])->name('admin.addProduct');

    //Pickup date and time

    Route::get('pickupdate', [AdminPickupDateandTime::class, 'index'])->name('admin.pickupdate');
    Route::post('updatePickupDate', [AdminPickupDateandTime::class, 'update'])->name('admin.updatePickupDate');
   
    //pending payment
    Route::post('updatePaymentStatus', [AdminPendingPaymentController::class, 'updatepaymentstatus'])->name('admin.updatePaymentStatus');
    Route::get('pendingpage', [AdminPendingPaymentController::class, 'PendingPayments'])->name('admin.pendingpage');

    //Walkin page
    Route::get('walkin', [AdminWalkinController::class, 'index'])->name('admin.walkin');
    Route::post('insertWalkin', [AdminWalkinController::class, 'store'])->name('admin.walkinStore');


    //AJAX
    Route::GET('getPrice_FABRIC/{id}', [AppointmentController::class, 'getPrice_FABRIC']);
    Route::GET('getPrice/{id}', [AppointmentController::class, 'getPrice']);
    Route::GET('getAmount/{id}', [AppointmentController::class, 'getAmount']);
    Route::GET('getAmount_Fabric/{id}', [AppointmentController::class, 'getAmount_Fabric']);
    Route::POST('getAmount', [AppointmentController::class, 'getAmount'])->name('getAmount');
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
    Route::get('appointment', [AppointmentController::class, 'index'])->name('user.appointment');
    Route::post('appointment', [AppointmentController::class, 'store'])->name('user.CreateAppointment');
    Route::post('CreateAppFabric', [AppointmentController::class, 'CreateAppFabric'])->name('user.CreateAppFabric');
    Route::get('appointment-list', [AppointmentController::class, 'listOfAppointment'])->name('user.listofappointment');
    Route::post('insertpartialpayment', [AppointmentController::class, 'InsertPartialPayment'])->name('user.insertpartialpayment');
    Route::get('ecommerce', [EcommerceController::class, 'index'])->name('user.ecommerce');

    Route::get('/', [EcommerceController::class, 'index']);
    Route::get('cart', [EcommerceController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [EcommerceController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [EcommerceController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [EcommerceController::class, 'remove'])->name('remove.from.cart');

    Route::post('Ecommerce_CheckOut', [EcommerceController::class, 'Ecommerce_CheckOut'])->name('user.Ecommerce_CheckOut');


    //AJAX
    Route::GET('getPrice_FABRIC/{id}', [AppointmentController::class, 'getPrice_FABRIC']);
    Route::GET('getPrice/{id}', [AppointmentController::class, 'getPrice']);
    Route::GET('getAmount/{id}', [AppointmentController::class, 'getAmount']);
    Route::GET('getAmount_Fabric/{id}', [AppointmentController::class, 'getAmount_Fabric']);
    Route::POST('getAmount', [AppointmentController::class, 'getAmount'])->name('getAmount');
});


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
