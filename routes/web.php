<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarTagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::resource('car', CarController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index'); 

Route::get('/car/tag/{tag_id}', [App\Http\Controllers\CarTagController::class, 'getFilteredCars'])->name('car_tag'); 

Route::view('/about', 'about')->name('about');

Route::resource('user', UserController::class);

// Attach / Detach Tags to Car
Route::get('/car/{car_id}/tag/{tag_id}/attach', [App\Http\Controllers\CarTagController::class, 'attachTag']);
Route::get('/car/{car_id}/tag/{tag_id}/detach', [App\Http\Controllers\CarTagController::class, 'detachTag']);
