<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Customer;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('signin.custom');


Route::get('/register', [AuthController::class, 'signup'])->name('register');
Route::post('/create-user', [AuthController::class, 'customSignup'])->name('user.registration');


Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::put('/update-user', [AuthController::class, 'updateUser'])->name('user.update');


//Route::get('/product/add', function(){ return view('product.add'); })->name('product.add');
//Route::get('/product', [AuthController::class, 'index'] )->name('product.list');
//Route::get('/product/list', [AuthController::class, 'index'] )->name('product.list');

Route::resource('products', ProductController::class);

Route::resource('todo', TodoController::class);

Route::get('gettoken', [ContactController::class, 'get_token'])->name('contacts.token');

Route::resource('contacts', ContactController::class);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('customer', CustomerController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
