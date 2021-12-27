<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function(){
    if(Auth::user()){
      return redirect()->route('home');
    }

    return redirect('/login');
});

Route::get('login/portfolio', [LoginController::class,'login'])->name('portfolio');

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('categories.index');
})->name('home');

Route::group(['middleware' => 'auth'], function(){
  Route::get('boards', [BoardController::class,'index'])->name('boards.index');
  Route::get('boards/create/{id}', [BoardController::class,'create'])->name('boards.create');
  Route::post('boards/create', [BoardController::class,'store'])->name('boards.store');
  Route::get('boards/edit/{board}', [BoardController::class, 'edit'])->name('boards.edit');
  Route::put('boards/edit/{board}', [BoardController::class,'update'])->name('boards.update');
  Route::delete('boards/{board}',[BoardController::class,'destroy'])->name('boards.destroy');
});

Route::group(['middleware' => 'auth'], function(){
  Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
  Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
  Route::post('categories', [CategoryController::class,'store'])->name('categories.store');
  Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
  Route::put('categories/edit/{category}', [CategoryController::class,'update'])->name('categories.update');
  Route::delete('categories/{category}', [CategoryController::class,'destroy'])->name('categories.destroy');
  Route::get('categories/{category}', [CategoryController::class,'show'])->name('categories.show');
});
