<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\IndexController;


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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});


Route::middleware(['auth','role:admin'])->group(function () {

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/all' , 'CategoryAll')->name('category.all');
        Route::get('/category/add' , 'CategoryAdd')->name('category.add');
        Route::post('/category/store' , 'CategoryStore')->name('category.store');
        Route::get('/category/edit/{id}' , 'CategoryEdit')->name('category.edit');
        Route::post('/category/update' , 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}' , 'CategoryDelete')->name('category.delete');
    });

    Route::controller(BlogController::class)->group(function(){
        Route::get('/blog/all' , 'BlogAll')->name('blog.all');
        Route::get('/blog/add' , 'BlogAdd')->name('blog.add');
        Route::post('/blog/store' , 'BlogStore')->name('blog.store');
        Route::get('/blog/edit/{id}' , 'BlogEdit')->name('blog.edit');
        Route::post('/blog/update' , 'BlogUpdate')->name('blog.update');
        Route::get('/blog/delete/{id}' , 'BlogDelete')->name('blog.delete');
    });

});


Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');


//FRONTEND BLOG DETAILS
Route::get('/blog/details/{id}', [IndexController::class, 'BlogDetails']);

