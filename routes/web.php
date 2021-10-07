<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function () {
    return view("welcome");
})->name("home");

Route::resource("characters", CharacterController::class)
    ->scoped([
        "character" => "slug",
    ])
    ->middleware("auth");

Route::resource("session", SessionController::class)->only([
    "create",
    "store",
    "destroy",
]);
Route::resource("register", RegisterController::class)->only([
    "create",
    "store",
    "destroy",
]);
