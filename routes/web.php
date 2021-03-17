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
    Route::get('project', 'ProjectController@index')->name('project.index');
    Route::get('project/add', 'ProjectController@add')->name('project.add');
    Route::post('project/store', 'ProjectController@store')->name('project.store');
    Route::get('project/edit/{id}', 'ProjectController@edit')->name('project.edit');
    Route::post('project/update/{id}', 'ProjectController@update')->name('project.update');
    Route::get('project/delete/{id}', 'ProjectController@delete')->name('project.delete');

    Route::get('contact', 'ContactController@index')->name('contact.index');
});
