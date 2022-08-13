<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
Route::post('saveProduct', [ProductController::class, 'save']); //!not a page.
Route::get('editProduct/{id}', [ProductController::class, 'edit']);
Route::post('updateProduct', [ProductController::class, 'update']); //!not a page.
Route::get('deleteProduct/{id}', [ProductController::class, 'delete']); //!not a page.

//Admin routing
Route::get('listAdmin', [AdminController::class, 'index'])->middleware('isLoggedIn');
Route::post('saveAdmin', [AdminController::class, 'save']); //!not a page.
Route::get('editAdmin/{id}', [AdminController::class, 'edit']);
Route::post('updateAdmin', [AdminController::class, 'update']); //!not a page.
Route::get('deleteAdmin/{id}', [AdminController::class, 'delete']); //!not a page.

//login routing
Route::get('loginAdmin',[AdminLoginController::class, 'login'])->middleware('alreadyLoggedIn'); //login page
Route::get('registrationAdmin',[AdminLoginController::class, 'registration'])->middleware('isLoggedIn'); //add admin page
Route::post('newAdmin',[AdminLoginController::class, 'newAdmin'])->name('newAdmin'); //push form to db //!not a page
Route::post('adminSignIn',[AdminLoginController::class, 'signIn'])->name('adminSignIn'); //push form to db //!not a page
Route::get('adminLogOut',[AdminLoginController::class, 'logOut']); //pull session to log out. //!not a page

//user routing
Route::get('/', [ProductController::class, 'home']);
Route::get('shop', [ProductController::class, 'shop']);
Route::get('shopSingle', [ProductController::class, 'shopSingle']);
Route::get('about', [ProductController::class, 'about']);
Route::get('contact', [ProductController::class, 'contact']);
<<<<<<< HEAD
Route::get('login', [ProductController::class, 'login']);
=======

//category routing
Route::get('listCategory', [CategoryController::class, 'index']); //List category page
Route::get('addCategory', [CategoryController::class, 'add']); //Add new category page
Route::post('saveCategory', [CategoryController::class, 'save']); //Save category on add new //!not a page
Route::get('editCategory/{id}', [CategoryController::class, 'edit']); //Edit category page
Route::post('updateCategory', [CategoryController::class, 'update']); //Save category on update //!not a page.
Route::get('deleteCategory/{id}', [CategoryController::class, 'delete']); //Delete category //!not a page.
>>>>>>> 65c2fc025511dfbb958bc8070ad5b509b741089b
