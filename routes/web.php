<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

//Product routing
Route::get('listProduct', [ProductController::class, 'index']);
Route::get('addProduct', [ProductController::class, 'add']);
Route::post('saveProduct', [ProductController::class, 'save']);
Route::get('editProduct/{id}', [ProductController::class, 'edit']);
Route::post('updateProduct', [ProductController::class, 'update']);
Route::get('deleteProduct/{id}', [ProductController::class, 'delete']);

//Admin routing
Route::get('listAdmin', [AdminController::class, 'index'])->middleware('isLoggedIn');
Route::get('addAdmin', [AdminController::class, 'add']);
Route::post('saveAdmin', [AdminController::class, 'save']);
Route::get('editAdmin/{id}', [AdminController::class, 'edit']);
Route::post('updateAdmin', [AdminController::class, 'update']);
Route::get('deleteAdmin/{id}', [AdminController::class, 'delete']);

//login routing
Route::get('loginAdmin',[AdminLoginController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('registrationAdmin',[AdminLoginController::class, 'registration'])->middleware('isLoggedIn');
Route::post('newAdmin',[AdminLoginController::class, 'newAdmin'])->name('newAdmin');
Route::post('adminSignIn',[AdminLoginController::class, 'signIn'])->name('adminSignIn');
Route::get('adminLogOut',[AdminLoginController::class, 'logOut']);

//user routing
Route::get('/', [ProductController::class, 'home']);
Route::get('shop', [ProductController::class, 'shop']);
Route::get('shopSingle', [ProductController::class, 'shopSingle']);
Route::get('about', [ProductController::class, 'about']);
Route::get('contact', [ProductController::class, 'contact']);