<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\CustomerLoginController;

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




//*Product routing

Route::get('listProduct', [ProductController::class, 'index'])->middleware('isLoggedIn');
Route::get('addProduct', [ProductController::class, 'add'])->middleware('isLoggedIn');
Route::post('saveProduct', [ProductController::class, 'save'])->middleware('isLoggedIn'); //!not a page.
Route::get('editProduct/{id}', [ProductController::class, 'edit'])->middleware('isLoggedIn');
Route::post('updateProduct', [ProductController::class, 'update'])->middleware('isLoggedIn'); //!not a page.
Route::get('deleteProduct/{id}', [ProductController::class, 'delete'])->middleware('isLoggedIn'); //!not a page.


//*Admin routing

Route::get('listAdmin', [AdminController::class, 'index'])->middleware('isLoggedIn');
Route::post('saveAdmin', [AdminController::class, 'save']); //!not a page.
Route::get('editAdmin/{id}', [AdminController::class, 'edit']);
Route::post('updateAdmin', [AdminController::class, 'update']); //!not a page.
Route::get('deleteAdmin/{id}', [AdminController::class, 'delete']); //!not a page.


//* Admin login routing

Route::get('loginAdmin', [AdminLoginController::class, 'login'])->middleware('alreadyLoggedIn'); //login page
Route::get('registrationAdmin', [AdminLoginController::class, 'registration'])->middleware('isLoggedIn'); //add admin page
Route::post('newAdmin', [AdminLoginController::class, 'newAdmin'])->name('newAdmin'); //push form to db //!not a page
Route::post('adminSignIn', [AdminLoginController::class, 'signIn'])->name('adminSignIn'); //push form to db //!not a page
Route::get('adminLogOut', [AdminLoginController::class, 'logOut']); //pull session to log out. //!not a page


//*category routing

Route::get('listCategory', [CategoryController::class, 'index']); //List category page
Route::get('addCategory', [CategoryController::class, 'add'])->middleware('isLoggedIn'); //Add new category page
Route::post('saveCategory', [CategoryController::class, 'save'])->middleware('isLoggedIn'); //Save category on add new //!not a page
Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->middleware('isLoggedIn'); //Edit category page
Route::post('updateCategory', [CategoryController::class, 'update'])->middleware('isLoggedIn'); //Save category on update //!not a page.
Route::get('deleteCategory/{id}', [CategoryController::class, 'delete'])->middleware('isLoggedIn'); //Delete category //!not a page.


//*user routing

Route::get('/', [CustomerController::class, 'homepage']);
Route::get('shop', [CustomerController::class, 'shop']);
Route::get('shopSingle', [CustomerController::class, 'shopSingle']); //!Add /{id} to shopSingle link
Route::get('about', [CustomerController::class, 'about']);
Route::get('cart', [CustomerController::class, 'cart']);
Route::get('contact', [CustomerController::class, 'contact']);
Route::get('customerLogin', [CustomerLoginController::class, 'login']); //run sign in page
Route::get('customerRegister', [CustomerLoginController::class, 'registration']);
Route::post('saveCustomer', [CustomerController::class, 'save']); //!not a page.
Route::get('listCustomer', [CustomerController::class, 'index'])->middleware('isLoggedIn'); //!List customer on ADMIN page
Route::get('deleteCustomer/{id}', [CustomerController::class, 'delete'])->middleware('isLoggedIn'); //!not a page.
Route::get('customerAddCart', [CustomerController::class, 'addCart']); //create session to add card. //!not a page

//*user

Route::get('loginCustomer', [CustomerLoginController::class, 'login']); //login page
Route::get('registerCustomer', [CustomerLoginController::class, 'registration']);//add Customer page
Route::post('newCustomer', [CustomerLoginController::class, 'newCustomer'])->name('newCustomer'); //push form to db //!not a page
Route::post('customerSignIn', [CustomerLoginController::class, 'signIn'])->name('customerSignIn'); //push form to db //!not a page
Route::get('customerLogOut', [CustomerLoginController::class, 'logOut']); //pull session to log out. //!not a page

