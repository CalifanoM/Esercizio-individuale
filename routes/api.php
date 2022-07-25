<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlassesController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Public Routes
Route::post('registration',[AuthController::class, 'register']);
Route::post('login', [AuthController::class,'login']);
Route::get('stampa-occhiali',[GlassesController::class, 'stampa']);
Route::get('stampa-m/{id_brand}',[GlassesController::class, 'stampaPerMarchio']);
Route::get('stampa-c/{id_category}',[GlassesController::class, 'stampaPerCategoria']);
Route::get('stampa-t/{id_type}',[GlassesController::class, 'stampaPerTipo']);
Route::get('stampa-cl/{id_color}',[GlassesController::class, 'stampaPerColore']);
Route::post('import-csv',[GlassesController::class, 'importcsv']);




//Private Routes
Route::group(['middleware' => ['auth:sanctum']], function (){

Route::post('ins-brand', [GlassesController::class,'store_brand']);
Route::post('ins-categoria', [GlassesController::class,'store_category']);
Route::post('ins-colore', [GlassesController::class,'store_color']);
Route::post('ins-tipo', [GlassesController::class,'store_type']);
Route::post('ins-occhiali', [GlassesController::class,'store_glasses']);
Route::put('update-occ/{id_glasses}', [GlassesController::class,'updateocchiali']);
Route::delete('delete-occ/{id_glasses}', [GlassesController::class, 'deleteocchiali']);
Route::post('logout', [AuthController::class, 'logout']);


});
