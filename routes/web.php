<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;





Route::get("/",[HomeController::class,"index"]);
Route::get("redirects",[HomeController::class,"redirects"]);

Route::get("/users",[AdminController::class,"user"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);
Route::get("/updateview/{id}",[AdminController::class,"updateview"]);
Route::post("/update/{id}",[AdminController::class,"update"]);

Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);

Route::get("/viewchef",[AdminController::class,"viewchef"])->name('viewchef');
Route::post("/uploadchef",[AdminController::class,"uploadchef"]);
Route::get("/updatechef/{id}",[AdminController::class,"updatechef"]);
Route::post("/updatefoodchef/{id}",[AdminController::class,"updatefoodchef"]);

Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);

Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);




Route::get("/foodmenu",[AdminController::class,"foodmenu"])->name('foodmenu');
Route::post("/uploadfood",[AdminController::class,"upload"]);

Route::get("/orders",[AdminController::class,"orders"]);


Route::get("/search",[AdminController::class,"search"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/redirects');
    })->name('dashboard');
});
