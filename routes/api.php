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

Route::GET('cost','CostController@GetCost');
Route::GET('sumcost','CostController@SumCost');
Route::POST('cost/create','CostController@CreateCost');
Route::GET('cost/delete/{id}','CostController@DeleteCost');
Route::POST('cost/update/{id}','CostController@UpdateCost');

Route::POST('login','LoginController@LoginAuth');
Route::GET('checkauth','LoginController@CheckAuth');
Route::GET('logout','LoginController@LogoutAuth');
