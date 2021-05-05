<?php

use App\Http\Livewire\User\TabList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockageController;
use App\Http\Controllers\UserRoleController;

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
    return view('Dashboard');
})->name('Dashboard')->middleware('auth');


Route::get('employer',[UserController::class, 'index'])->name('user.index');
Route::get('employer/{ref}', [UserController::class, 'show'])->name('user.show');
Route::post('employer' , [TabList::class , 'store']);
Route::post('employer/{ref}/delete', [TabList::class, 'destroy']);
Route::resource('roles', UserRoleController::class)->only(['show','store']);


Route::view('login', 'Pages.Auth.login')->name('login');
Route::view('password', 'Pages.Auth.password')->name('password');
Route::post('login', [UserController::class, 'Auth'])->name('login.attemp');
Route::post('password', [UserController::class, 'Password'])->name('login.password');



Route::resource('stockage', StockageController::class);
