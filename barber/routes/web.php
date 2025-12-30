<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\QueueController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\UserHomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {

    // Admin Authentication Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('guest:admin');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    // AdminHomeController
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    Route::get('/blank', [AdminHomeController::class, 'blankPage'])->name('blank');

    // Services
    Route::resource('services', ServiceController::class);
    Route::get('services/{service}/image', [ServiceController::class, 'editImage'])->name('services.editImage');
    Route::post('services/{service}/image', [ServiceController::class, 'updateImage'])->name('services.updateImage');

    // Customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers');
    Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('customers/{id}/invoice', [CustomerController::class, 'createInvoice'])->name('customers.invoice.create');
    Route::post('customers/{id}/invoice', [CustomerController::class, 'storeInvoice'])->name('customers.invoice');

    // Invoices
    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('invoices/{billingId}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::delete('invoices/{billingId}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    Route::post('invoices/{billingId}/process', [InvoiceController::class, 'process'])->name('invoices.process');
    Route::post('invoices/{billingId}/complete', [InvoiceController::class, 'complete'])->name('invoices.complete');
    Route::get('invoices/{billingId}/print', [InvoiceController::class, 'print'])->name('invoices.print');

    //Antrian
    Route::get('antrian', [QueueController::class, 'index'])->name('queue.index');
    Route::post('antrian/next', [QueueController::class, 'nextQueue'])->name('queue.next');

    // Settings & Pages
    Route::get('settings', [SettingController::class, 'showSettings'])->name('settings.show');
    Route::post('settings/password', [SettingController::class, 'updatePassword'])->name('settings.password');
    Route::get('pages/{type}', [SettingController::class, 'showPage'])->name('pages.show'); // type: aboutus, location
    Route::post('pages/{type}', [SettingController::class, 'updatePage'])->name('pages.update');

});

Route::middleware('auth')->group(function () {

    Route::get('/user/dashboard', [UserHomeController::class, 'index'])
        ->name('user.dashboard');

    Route::post('/user/contact', [UserHomeController::class, 'contact'])
        ->name('user.contact');

    Route::post('/user/profile', [UserHomeController::class, 'updateProfile'])
        ->name('user.profile.update');

    Route::get('/user/invoice/{billingId}', [UserHomeController::class, 'invoiceDetail'])
        ->name('user.invoice');

});


// Dashboard Utama
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    return redirect()->route('dashboard');

});
// User Authentication Routes
Route::get('user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('user/login', [UserLoginController::class, 'login'])->name('user.login.submit');

// User Registration Routes
Route::get('user/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('user/register', [RegisterController::class, 'register'])->name('user.register.submit');

// User Logout Route
Route::post('user/logout', [UserLoginController::class, 'logout'])->name('user.logout');

//User Booking Route
Route::get('user/booking', [BookingController::class, 'create'])->name('booking.form');
Route::post('user/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/confirm/{billingId}', [BookingController::class, 'confirm'])->name('booking.confirm');