<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, "index" ]);
Route::get("/annonces",[AccountController::class, "index" ]);
Route::get("/create-account",[AccountController::class, "create" ]);
Route::get("/view-profile",[OwnerController::class, "profile" ]);
Route::get("/posts",[PostController::class, "post" ]);
Route::get("/view-profile",[SiteController::class, "photoRandom" ]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-account/add', [UserController::class, 'add']);
Route::post('/add-account/save', [UserController::class, 'save']);



