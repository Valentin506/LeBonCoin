<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;

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
// Route::get("/create-account",[AccountController::class, "create" ]);
Route::get("/posts",[PostController::class, "post" ]);
Route::get("/post/{id}",[PostController::class, "one" ]);
Route::get("/view-profile",[OwnerController::class, "owner" ]);
Route::get("/profile/{id}",[OwnerController::class, "one" ])->name('profil');
Route::get("/view-profile",[SiteController::class, "photoRandom" ]);
// Route::get("/view-profile",[SiteController::class, "ownerRandom" ]);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/ville', function () {
//     return view('ville-list');
// });



Route::get('/create-account', [AccountController::class, 'add']);
Route::post('/create-account/save', [AccountController::class, 'save']);


Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/login', [LoginController::class, 'doLogin']);
// Route::get('/connect-account', 'LoginController@index')->middleware('auth');




