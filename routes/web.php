<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// All listings
Route::get('/', [ListingController::class, "index"]);

// show create from
Route::get('/listings/create', [ListingController::class, 
"create"])->middleware("auth");

// store listing data
Route::post('/listings', [ListingController::class, "store"])->middleware("auth");

// Show edit form
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->middleware("auth");

// Update listing
Route::put("/listings/{listing}", [ListingController::class, "update"])->middleware("auth");

// Delete listing
Route::delete("/listings/{listing}", [ListingController::class, "destroy"])->middleware("auth");

// manage listings
Route::get("/listings/manage", [ListingController::class, "manage"]);

// single listings
Route::get('/listings/{listing}', [ListingController::class, "show"])->middleware("auth");

// Show register/create form
Route::get("/register", [UserController::class, "create"])->middleware("guest");

// create new user
Route::post("/users", [UserController::class, "store"]);

// log user out
Route::post("/logout", [UserController::class, "logout"])->middleware("auth");

// show login form
Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");

// login user
Route::post("/users/authenticate", [UserController::class, "authenticate"]);



// Route::get('/hello', function(){
//     return response('<h1>hello world</h1>', 200)
//         ->header("Content-type", "text/plain")
//         ->header("foo", "bar");
// });

// Route::get("/posts/{id}", function($id){
//     return response("Post " . $id);
// })->where("id", "[0-9]+");

// Route::get("/search", function(Request $request){
//     return $request->name . " " . $request->city;
// });
