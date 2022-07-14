<?php

use App\Http\Controllers\User\HomeController;
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

Route::auth();

Route::get('', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'posts', 'as' => 'posts.'], static function (): void {
    Route::get('/', [HomeController::class, 'allPosts'])->name('all');
});

Route::group([
    'prefix' => 'categories',
    'as' => 'categories.',
], static function (): void {
    Route::get('/{slug}', [HomeController::class, 'getPostsByCategory'])->name(
        'get-posts'
    );
});

//
//Route::get('/category/{slug}', [HomeController::class, 'getPostsByCategory'])->name(
//    'home.get-posts-by-category'
//);

