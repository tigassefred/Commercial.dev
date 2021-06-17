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




Route::get('/stockage', [StockageController::class, 'index'])->name('stockage.index');
Route::post('/stockage', [StockageController::class, 'store'])->name('stockage.store');
Route::post('/stockage/{id}', [StockageController::class, 'update'])->name('stockage.update');
Route::get('/api/stockage', [StockageController::class, 'delete'])->name('stockage.delete');
Route::get('/stockage/Gestion', [StockageController::class, 'index_stockage'])->name('Gestion.index');
Route::get('/stockage/mouvement', [StockageController::class, 'index_mouvement'])->name('mouvement.index');


Route::get('employer',[UserController::class, 'index'])->name('user.index');
Route::get('employer/{ref}', [UserController::class, 'show'])->name('user.show');
Route::post('employer' , [TabList::class , 'store']);
Route::post('employer/{ref}/delete', [TabList::class, 'destroy']);
Route::resource('roles', UserRoleController::class)->only(['show','store']);


Route::view('login', 'Pages.Auth.login')->name('login');
Route::view('password', 'Pages.Auth.password')->name('password');
Route::post('login', [UserController::class, 'Auth'])->name('login.attemp');
Route::post('password', [UserController::class, 'Password'])->name('login.password');
Route::post('logout', [UserController::class, 'logout'])->name('logout');






Route::middleware('auth')->prefix('api')->group(function(){
    Route::get('Stockage_check_name_exist', [StockageController::class, 'index_by_name'])->name('Stockage_check_name_exist');
    Route::get('Check_if_article_existe_edit', [StockageController::class, 'index_by_name_edit'])->name('Check_if_article_existe_edit');
});



