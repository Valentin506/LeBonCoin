<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoUserController;
use App\Http\Controllers\PhotoPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositPostController;
use App\Http\Controllers\AddPostController; 
use App\Http\Controllers\FavorisController; 

use App\Models\Post;
use App\Models\PhotoPost;
use App\Models\Owner;
use App\Models\User;
use App\Models\Address;
use App\Models\PhotoUser;
use App\Models\TypeHebergement;
use App\Models\CapaciteLogement;
use App\Models\Equipement;
use App\Models\Favorite;


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
// Route::get("/annonces",[AccountController::class, "index" ]);
// Route::get("/create-account",[AccountController::class, "create" ]);
Route::get("/posts",[PostController::class, "post" ]);
Route::get("/post/{id}",[PostController::class, "one" ]);
Route::get("/profiles",[OwnerController::class, "owner" ]);
Route::get("/profile/{id}",[OwnerController::class, "one" ]);
Route::get("/view-profile",[SiteController::class, "photoRandom" ]);
Route::get("/deposit-post",[DepositPostController::class, "post" ]);
Route::post("/deposit-post/save",[DepositPostController::class, 'save' ]);
Route::post("/posts",[PostController::class, "getPostsByCity" ]);


Route::get('/account/{idcompte}', [UserController::class, 'one']);
Route::get('/account/{idcompte}/modif-account', [UserController::class, 'modifAccount']);
Route::get('/account/{idcompte}/modif-profile', [UserController::class, 'modifProfile']);
Route::get('/account/{idcompte}/modif-securite', [UserController::class, 'modifSecurite']);
Route::post('/modif-account/updateAccount', [UserController::class, 'updateAccount']);
Route::post('/modif-profile/updateProfile', [UserController::class, 'updateProfile']);
Route::post('/modif-account/updateSecurite', [UserController::class, 'updateSecurite']);


// Route::post('/posts/type', [PostController::class, 'search'])->name('posts');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::get("/view-profile",[SiteController::class, "ownerRandom" ]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ville', function () {
    return view('ville-list');
});

Route::get('/politique-confidentialite', function () {
    return view('politique-confidentialite');
});


// Route::get('/create-account', [AccountController::class, 'add']);
// Route::post('/create-account/save', [AccountController::class, 'save']);

Route::get('/create-account', [UserController::class, 'add']);
Route::post('/create-account/save', [UserController::class, 'save']);

Route::get('/favoris', [FavorisController::class, 'fav']);
Route::post('/favoris/save', [FavorisController::class, 'save']);


// Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::post('/login', [AuthController::class, 'doLogin']);





