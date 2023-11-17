<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get("/annonces",[AccountController::class, "index" ]);
Route::get("/create-account",[AccountController::class, "create" ]);
Route::get("/view-profile",[OwnerController::class, "profile" ]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-account', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);



