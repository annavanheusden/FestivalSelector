<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;

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


Route::get('festivals', [FestivalController::class, "index"]);
Route::get('festivals/{id}', [FestivalController::class, "detail"]);
Route::get('festivals/soap/test', [FestivalController::class, "SoapTest"]);

