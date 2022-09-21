<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ImageController;

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
    return view('/auth/login');
});

//login route
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');

//route group for middleware authentication
Route::group(['middleware'=>['AuthValidate']], function(){
    //user
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/admin/dashboard', [MainController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/edit-profile/{id}', [MainController::class, 'editProfile'])->name('admin.editProfile');
    Route::put('update-profile/{id}', [MainController::class, 'updateProfile'])->name('admin.updateProfile');
    //images
    Route::get('/admin/edit-image/{id}', [ImageController::class, 'editImage'])->name('image.edit');
    Route::put('update-image/{id}', [ImageController::class, 'updateImage'])->name('image.update');
    Route::get('/admin/delete-image/{id}', [ImageController::class, 'deleteImage'])->name('image.delete');
});

Route::post('/upload-image', [ImageController::class, 'storeImage'])->name('image.store');