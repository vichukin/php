<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('registration');
// });
Route::get('/',[AuthentificationController::class,"getRegistration"]);
Route::post('/',[AuthentificationController::class,"postRegistration"]);
