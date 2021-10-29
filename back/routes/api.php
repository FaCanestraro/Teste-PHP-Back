<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/select-empresa', 'App\Http\Controllers\EmpresaController@getEmpresa');
Route::post('/select-uf-empresa', 'App\Http\Controllers\EmpresaController@getUfEmpresa');
Route::post('/empresa/add', 'App\Http\Controllers\EmpresaController@addEmpresa');


Route::post('/cliente-fisica/add', 'App\Http\Controllers\ClienteController@addClienteFisico');
Route::post('/cliente-juridica/add', 'App\Http\Controllers\ClienteController@addClienteFisico');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
