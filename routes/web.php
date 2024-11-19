<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Guest\LeadController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/guest")->name("guest.")->group(function () {
    Route::get("/projects", [GuestProjectController::class, "index"])->name("projects.index");
    Route::get("/projects/{id}", [GuestProjectController::class, "show"])->name("projects.show");

    Route::get("/contact-us", [LeadController::class, "create"])->name("leads.create");
    Route::post("/contact-us", [LeadController::class, "store"])->name("leads.store");
});

Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function () {
    Route::get("/projects", [AdminProjectController::class, "index"])->name("projects.index");
    Route::get("/projects/deleted", [AdminProjectController::class, "deletedIndex"])->name("projects.deleted-index");
    Route::post("/projects", [AdminProjectController::class, "store"])->name("projects.store");
    Route::get("/projects/create", [AdminProjectController::class, "create"])->name("projects.create");
    Route::get("/projects/{id}", [AdminProjectController::class, "show"])->name("projects.show");
    Route::put("/projects/{id}", [AdminProjectController::class, "update"])->name("projects.update");
    Route::delete("/projects/{id}", [AdminProjectController::class, "destroy"])->name("projects.delete");
    Route::delete("/projects/{id}/permanent-delete", [AdminProjectController::class, "permanentDelete"])->name("projects.permament-delete");
    Route::get("/projects/{id}/edit", [AdminProjectController::class, "edit"])->name("projects.edit");
    Route::patch("/projects/{id}/restore", [AdminProjectController::class, "restore"])->name("projects.restore");
});