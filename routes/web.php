<?php

use App\Http\Livewire\User\TabList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('employer',[UserController::class, 'index'])->name('user.index');
Route::get('employer/{ref}', [UserController::class, 'show'])->name('user.show');
Route::post('employer' , [TabList::class , 'store']);
Route::post('employer/{ref}/delete', [TabList::class, 'destroy']);
