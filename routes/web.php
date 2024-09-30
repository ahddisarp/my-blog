<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;

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
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Home route after login
Route::get('/home', [PostController::class, 'index'])->name('home');

// Admin routes with middleware protection
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('admin/posts', PostController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::get('/test', [PostController::class, 'test']);
Route::post('logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to the login page or any other page
})->name('logout');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
