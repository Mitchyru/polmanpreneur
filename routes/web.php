<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

Route::get('/', 'App\Http\Controllers\LandingPageController@index');
Route::get('/welcome', 'App\Http\Controllers\LandingPageController@index');
Route::get('/product', 'App\Http\Controllers\ProductController@index');

Route::post('/addContact', [ContactController::class, 'store']);
Route::get('/contact', [ContactController::class, 'show']);

Route::get('/auth', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/viewProduct', ['as' => 'viewProduct', 'uses' => 'App\Http\Controllers\ProductController@index']);
Route::post('/filter', [ProductController::class, 'filter']);
Route::get('/detailProduct/{product_id}', ['as' => 'detailProduct', 'uses' => 'App\Http\Controllers\ProductController@detailProduct']);
Route::post('/product/review', [ProductController::class, 'submitReview'])->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::post('photo', ['as' => 'profile.photo', 'uses' => 'App\Http\Controllers\ProfileController@photo']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::delete('/product/{product_id}', 'App\Http\Controllers\UserController@productDestroy')->name('user.productDestroy');
	Route::get('/updateStock/{product_id}', 'App\Http\Controllers\UserController@updateStock')->name('user.updateStock');
	Route::get('/updateVisible/{product_id}', 'App\Http\Controllers\UserController@updateVisible')->name('user.updateVisible');
	Route::get('/editIndex', ['as' => 'user.editIndex', 'uses' => 'App\Http\Controllers\UserController@edit']);
	Route::get('/editProduct/{product_id}', ['as' => 'user.editProduct', 'uses' => 'App\Http\Controllers\UserController@editProduct']);
	Route::put('/updateProduct/{product_id}', ['as' => 'user.updateProduct', 'uses' => 'App\Http\Controllers\UserController@updateProduct']);
	Route::post('/userTestimonials', ['as' => 'userTestimonials', 'uses' => 'App\Http\Controllers\LandingPageController@send']);
	Route::get('/formPage', ['as' => 'formPage', 'uses' => 'App\Http\Controllers\LetterController@create']);
	Route::post('/formStore', ['as' => 'formStore', 'uses' => 'App\Http\Controllers\LetterController@store']);
	Route::get('/formStore', ['as' => 'chat', 'uses' => 'App\Http\Controllers\ChatsController@dashboard']);
	Route::get('/chat/{id}', [ChatsController::class, 'index']);
	Route::get('/messages', [ChatsController::class, 'fetchMessages']);
	Route::post('/messages', [ChatsController::class, 'sendMessage']);
});

Route::group(['middleware' => ['auth','userLevel']], function () {
	Route::get('/user', 'App\Http\Controllers\UserController@index')->name('admin.index');
	Route::get('/updateStatus/{nim}', 'App\Http\Controllers\UserController@updateStatus')->name('user.updateStatus');
	Route::get('/updateLevel/{nim}', 'App\Http\Controllers\UserController@updateLevel')->name('user.updateLevel');
	Route::get('/updateSeller/{nim}', 'App\Http\Controllers\UserController@updateSeller')->name('user.updateSeller');
	Route::get('/searchUser', 'App\Http\Controllers\UserController@searchUser')->name('searchUser');
	Route::get('/searchUserApproval', 'App\Http\Controllers\UserController@searchUserApproval')->name('searchUserApproval');
	Route::get('/searchLetterApproval', 'App\Http\Controllers\LetterController@searchLetterApproval')->name('searchLetterApproval');
	Route::get('/searchProductApproval', 'App\Http\Controllers\UserController@searchProductApproval')->name('searchProductApproval');
	Route::get('/searchAllProduct', 'App\Http\Controllers\ProductController@searchAllProduct')->name('searchAllProduct');
	Route::get('/userApproval', ['as' => 'userApproval', 'uses' => 'App\Http\Controllers\ApprovalController@user']);
	Route::get('/productApproval', ['as' => 'productApproval', 'uses' => 'App\Http\Controllers\ApprovalController@product']);
	Route::get('/updateStatusProduct/{product_id}', 'App\Http\Controllers\UserController@updateStatusProduct')->name('user.updateStatusProduct');
	Route::get('/allProduct', ['as' => 'allProduct', 'uses' => 'App\Http\Controllers\ProductController@allProduct']);
	Route::get('testimonials', ['as' => 'pages.testimonials', 'uses' => 'App\Http\Controllers\TestimonialsController@index']);
	Route::get('/letterApproval', ['as' => 'letterApproval', 'uses' => 'App\Http\Controllers\ApprovalController@letter']);
	Route::delete('/contact/{contact_id}', 'App\Http\Controllers\ContactController@destroy')->name('admin.contactDestroy');
	Route::get('/contact', [ContactController::class, 'show']);	
	Route::get('/category', [CategoryController::class, 'index']);
	Route::get('/formCategory', [CategoryController::class, 'create']);
	Route::post('/addCategory', [CategoryController::class, 'store']);
	Route::get('category', [CategoryController::class, 'list']);
	Route::delete('/category/{category_id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.categoryDestroy');
});


Route::group(['middleware' => ['auth','userSeller']], function () {
	//PRODUCT
	Route::get('yourProduct/{user_id}', ['as' => 'yourProduct/{user_id}', 'uses' => 'App\Http\Controllers\UserController@yourProduct']);
	Route::get('addProduct', ['as' => 'users.addProduct', 'uses' => 'App\Http\Controllers\UserController@addProduct']);
	Route::post('add', ['as' => 'add', 'uses' => 'App\Http\Controllers\UserController@store']);
	Route::get('/searchProduct', 'App\Http\Controllers\UserController@searchProduct')->name('searchProduct');
});

