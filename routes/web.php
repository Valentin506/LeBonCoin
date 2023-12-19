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
use App\Http\Controllers\ReservationController; 
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\TypeHebergementController;

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
use App\Models\Calendar;
use App\Models\Employe;
use App\Models\Reservation;



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

// post controller
Route::get("/posts",[PostController::class, "post" ]);
Route::post("/posts",[PostController::class, "getPostsByCity" ]);
Route::get("/post/{id}",[PostController::class, "one" ]);
Route::post('/search/save', [PostController::class, 'searchSave']);
// Route::post("/post/{id}/check",[PostController::class, "getAvailableDates" ]);

// profile owner controller
Route::get("/profiles",[OwnerController::class, "owner" ]);
Route::get("/profile/{id}",[OwnerController::class, "one" ]);
// Route::get("/view-profile",[SiteController::class, "photoRandom" ]);

//deposit post controller
Route::get("/deposit-post",[DepositPostController::class, "post" ]);
Route::post("/deposit-post/save",[DepositPostController::class, 'save' ]);

//modification post controller
Route::get("/account/{idcompte}/my-posts",[UserController::class, "modifPost" ]);
Route::post("/account/{idcompte}/my-posts/update",[UserController::class, "updatePost" ]);
Route::post("/account/{idcompte}/my-posts/update-disponibilite",[UserController::class, "updateDisponibilite" ]);
Route::get("/account/{idcompte}/my-bookings",[UserController::class, "bookings" ]);

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




// Routes pour l'authentification des employés
Route::get('/employe/login', [EmployeController::class, 'showLoginForm'])->name('employe.login');
Route::post('/employe/login', [EmployeController::class, 'login']);
Route::post('/employe/logout', [EmployeController::class, 'logout'])->name('employe.logout');



Route::get('/register', [EmployeController::class, 'add'])->name('employe.register');
Route::post('/employe/register',  [EmployeController::class, 'register'])->name('employe.register');

Route::post('/register/save', [EmployeController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    // Routes pour les employés
    Route::get('/dashboard', function () {
        return view('employe.dashboard');
    })->name('employe.dashboard');
});
// return redirect()->route('employe.dashboard');




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

Route::get('/fiche-reservation', [ReservationController::class, 'add']);
Route::post('/fiche-reservation/{id}/save', [ReservationController::class, 'save']);

Route::get('/favoris', [UserController::class, 'favoris']);
Route::post('/favoris/{idannonce}/save', [FavorisController::class, 'save']);


Route::get('/reservation/{id}', [ReservationController::class, 'reservation'])->name('reservation');   




//Route::post('/reservation', [ReservationController::class, 'save']);
// Route::post('/favoris/save', [FavorisController::class, 'save']);


// Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
// Route::post('/login', [AuthController::class, 'doLogin']);



//Visualisation et ajout de type d'hébergement par le service petite annonce
Route::get('/types-hebergements', [TypeHebergementController::class, 'index'])->name('types-hebergements.index');
Route::get('/types-hebergements/create', [TypeHebergementController::class, 'create'])->name('types-hebergements.create');
Route::post('/types-hebergements/store', [TypeHebergementController::class, 'store']);


//Visualisation et ajout d'équipements' par le service petite annonce
Route::get('/equipements', [EquipementController::class, 'index'])->name('equipements.index');
Route::get('/equipements/create', [EquipementController::class, 'create'])->name('equipements.create');
Route::post('/equipements/store', [EquipementController::class, 'store']);




