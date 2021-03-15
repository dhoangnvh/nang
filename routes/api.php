<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('manager/save', 'User\ApiController@saveUserRoleAdmin');
Route::post('translator/save', 'User\ApiController@saveUserRoleTranslate');
Route::post('requester/save', 'User\ApiController@saveUserRoleRequest');
Route::post('user/save', 'User\ApiController@saveUserRoleUser');

Route::post('user/cancelation', 'User\ApiController@cancelationUser');
// Route::get('cancelation', 'User\ApiController@cancelationUser')->name('cancelation');

Route::get('seller-in-house', 'API\LazadaController@sellerInHouse');
Route::get('erp-system', 'API\LazadaController@erpSystem');
Route::get('application-for-test', 'API\LazadaController@applicationForTest');
Route::get('content-management', 'API\LazadaController@contentManagement');
Route::get('business-intelligence', 'API\LazadaController@businessIntelligence');
