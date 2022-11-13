<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
  Route::get("/", "accueil")->middleware("auth");
  Route::get("/compte", "vueCompte")->middleware("auth");
  Route::post("/compte/password", "changePassword")->middleware("auth");
});

Route::controller(AuthController::class)->group(function () {
  Route::get("/connexion", "vueConnexion")->name("login");
  Route::post("/connexion", "connexion");
  Route::get("/deconnexion", "deconnexion");
});
