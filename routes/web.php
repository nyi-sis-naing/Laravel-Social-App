<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::middleware('auth')->group(function(){
//page
Route::get('/',[PageController::class, "index"])->name("home")->middleware('auth');
Route::get("/user/createPost", [PageController::class, "createPost"])->name("createPost");
Route::get("/posts/{id}", [PageController::class, "seemore"])->name("seemore");
Route::get("/posts/edit/{id}", [PageController::class, "editPost"])->name("editPost");
Route::get("/user/userProfile", [PageController::class, "userProfile"])->name("userProfile");
Route::get("/user/contactUs", [PageController::class, "contactUs"])->name("contactUs");
Route::get('/admin/editMessage/{id}', [ContactUsController::class, "editMessage"])->name("editMessage");

//post
Route::post("/user/createPost", [PostController::class, "post"])->name("post");
Route::post("/posts/edit/update/{id}", [PostController::class, "updatePost"])->name("updatePost")->middleware("premiumUser");
Route::get("/posts/delele/{id}", [PostController::class, "deletePost"])->name("deletePost")->middleware("premiumUser");

//contacus
Route::post("/user/contactUs", [ContactUsController::class, "post_contactus"])->name("post_contactus");



Route::post("/user/userProfile", [AuthController::class, "post_userProfile"])->name("post_userProfile");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});

// admin
Route::middleware('admin')->group(function(){
    Route::get('/admin/index', [AdminController::class, "index"])->name("admin.home");
    Route::get('/admin/manage_premium_users', [AdminController::class, "manage_premium_users"])->name("admin.manage_premium_users");
    Route::get('/admin/delete_user/{id}', [AdminController::class, "deleteUser"])->name("admin.delete_user");
    Route::get('/admin/edit_user/{id}', [AdminController::class, "editUser"])->name("admin.edit_user");
    Route::post('/admin/update_user/{id}', [AdminController::class, "updateUser"])->name("admin.update_user");
    Route::get('/admin/contact_messages', [AdminController::class, "contact_messages"])->name("admin.contact_messages");
    Route::get('/admin/deleteMessage/{id}', [ContactUsController::class, "deleteMessage"])->name("deleteMessage");
    Route::post('/admin/updateMessage/{id}', [ContactUsController::class, "updateMessage"])->name("updateMessage");
});



Route::middleware('notloginguest')->group(function(){
//Authentication
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "post_login"])->name("post_login");
Route::get("/register", [AuthController::class, "regiser"])->name("register");
Route::post("/register", [AuthController::class, "post_register"])->name("post_register");
});




