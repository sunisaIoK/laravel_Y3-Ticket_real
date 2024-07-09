<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminpdfController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ZoneController;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('regis', 'regis');//->middleware('NowLogin');
    Route::post('regis-user', 'regisUser')->name('regis.user');


    Route::get('login', 'login');//->middleware('NowLogin');
    Route::post('/admin', 'loginUser')->name('login');

     Route::get('index', 'index');//->middleware('CheckLogin')
    Route::get('logout', 'logout');
    Route::get('home', 'home');
    Route::get('home', 'home');

    //Route::get('User-index', 'user');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/Admin', [AuthController::class, 'loginUser'])->name('admin');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/index', [AuthController::class, 'loginUser'])->name('user');
});

Route::controller(IndexController::class)->group(function () {
    Route::get('index','index');

   // Route::post('create-student', 'store')->name('student.store');
    // Route::get('all-student', 'index');
    // Route::get('show-student/{id}', 'show');
    // Route::get('edit-student/{id}', 'edit');
    // Route::post('update_student', 'update')->name('student.update');
    // Route::delete('delete-student/{id}', 'destroy')->name('student.delete');
});


Route::controller(ProfileController::class)->group(function () {
    Route::get('profile','create');
    Route::post('create-profile','store')->name('profile.store');
    Route::get('profileUser', 'ProfileUser');
    Route::get('show-profile/{id}', 'show');
    Route::get('edit-profile/{id}', 'edit');
    Route::post('update-profile', 'update')->name('profile.update');
    Route::delete('delete-profile/{id}', 'destroy')->name('profile.delete');
    Route::post('logout-profile/{id}', 'destroylogout')->name('logout44');
    Route::get('index1', 'index1');
    Route::get('/Home','index');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/checkout', 'Order')->name('order.order');
    // Route::get('/shop', 'shopProduct');
    Route::get('confirm', 'pay');

    Route::get('/index', 'showConcerts');
    // admin
    Route::get('createcon','createcon')->name('');
    Route::get('Admin', 'adminprofile');
    Route::get('Customer', 'cus');
    Route::get('show/{id}', 'showadmin');
    Route::get('edit/{id}', 'edit');
    Route::post('add','showAddForm')->name('add.data');
    Route::post('data', 'adddatacon')->name('add.data');
    Route::post('edit-con', 'updatecon')->name('admin.update');
});

Route::controller(ShopController::class)->group(function(){
    Route::get('/shop/{id}', 'buyTicket')->name('buyTicket');
});

Route::controller(PDFController::class)->group(function () {
    Route::get('/con', 'PDFdownload')->name('shop.pdf');
});

Route::controller(AdminpdfController::class)->group(function () {
    Route::get('/confi', 'PDFdownload')->name('admin.download');
});







