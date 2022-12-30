<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');

Route::post('/login', [LoginController::class, 'confirm'])->name('login.confirm');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// CRUD products
Route::resource('products', ProductController::class)
        ->missing(function (Request $request) {
            return Redirect::route('products.index');
        });

Route::get('products/{id}/delete', [DeleteProductController::class, 'delete'])->name('products.delete');

// CRUD brands
Route::resource('brands', BrandController::class)
        ->missing(function (Request $request) {
            return Redirect::route('brands.index');
        });
