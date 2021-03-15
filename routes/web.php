<?php
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
Route::view('/login', 'admin.login')->name('login');
Auth::routes(['register' => false]);
Route::view('dashboard', 'layout.master-layout')->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::get('du-an', 'DuAnController@index');
});
