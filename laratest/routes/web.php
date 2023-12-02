<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/greet', function () {
    return "hello my first laravel proj";
});
// Route::get('authors/{id}', function ($id=0) {
//     return "Your id = $id";
// });
Route::get('authors', [AuthorController::class,"list"]);
Route::get('authors/{id}', [AuthorController::class,"show"]);

Route::get('users/{id}/comments/{commentid}', function ($id=0,$commentid) {
    return "User $id owner comment with id $commentid ";
})->whereNumber("id");
Route::view("/home","home",["name"=>"Dmytro Vychkin","frameworks"=>["asp.net","react.js","node.js"]]);
