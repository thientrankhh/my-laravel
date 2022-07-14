<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
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

Route::get('login', [AuthController::class, 'login'])->name("admin.login");

Route::group(['prefix' => 'auth', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name("dashboard");
    Route::post('/login', [AuthController::class, 'checkLogin'])->name('check-login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    /** Categories */
    Route::get(
        '/categories/check-unique-name', [CategoryController::class, 'checkUniqueNameCategories']
    )->name('categories.check-unique-name');
    Route::get(
        '/categories/check-unique-name-in-edit', [CategoryController::class, 'checkUniqueNameCategoriesEdit']
    )->name('categories.check-unique-name-in-edit');
    Route::resource('categories', CategoryController::class);
    /** End Categories */

    /** Posts */
    Route::get(
        '/posts/check-unique-name', [PostController::class, 'checkUniqueNamePost']
    )->name('posts.check-unique-name');
    Route::get(
        '/posts/check-unique-name-in-edit', [PostController::class, 'checkUniqueNamePostEdit']
    )->name('posts.check-unique-name-in-edit');
    Route::resource('posts', PostController::class);
    /** End Posts */
});
