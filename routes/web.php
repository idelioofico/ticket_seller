<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/manual', [ManualController::class, 'index'])->name('manual');



Route::prefix('company')->name('company.')->group(function () {

    Route::view('/', "company.index")->middleware('can:gerir-empresa')->name('index');
    Route::get("/listar", [CompanyController::class, "index"])->middleware('can:gerir-empresa')->name("listar");
    Route::get('/create', [CompanyController::class, "create"])->middleware('can:registar-empresa')->name("create");
    Route::post("/store", [CompanyController::class, "store"])->middleware('can:registar-empresa')->name("store");
    Route::get("/{company}", [CompanyController::class, "show"])->name("show");
    Route::patch("/{company}/update", [CompanyController::class, "update"])->name("update");
});




Route::prefix('eventos')->name('events.')->group(function () {


    Route::prefix('tickets')->name('tickets.')->group(function () {

        Route::get('/{event}', [TicketController::class, 'index'])->name('index');
        Route::get('/{event}/create', [TicketController::class, "create"])->name("create");
        Route::post("/{event}/store", [TicketController::class, "store"])->name("store");
        Route::get("/{event}/show/{ticket}", [TicketController::class, "show"])->name("show");
        Route::get("/{event}/edit/{ticket}", [TicketController::class, "edit"])->name("edit");
        Route::patch("/update/{ticket}", [TicketController::class, "update"])->name("update");
    
        // Route::get('/{event:slug}', [TicketController::class, "view"])->name("view");
    
    });

    Route::prefix('whatsapp')->group(function () {
        Route::get('/', [EventController::class, 'guest'])->middleware('can:gerir-evento')->name('guest');
    });

    Route::get('/', [EventController::class, 'index'])->middleware('can:gerir-evento')->name('index');
    Route::get('/create', [EventController::class, "create"])->middleware('can:registar-evento')->name("create");
    Route::post("/store", [EventController::class, "store"])->middleware('can:registar-evento')->name("store");
    Route::get("/{event}/show", [EventController::class, "show"])->name("show");
    Route::get("/{event}/edit", [EventController::class, "edit"])->name("edit");
    Route::patch("/{event}/update", [EventController::class, "update"])->name("update");
    Route::get('/{event:slug}', [EventController::class, "view"])->name("view");

});

Route::prefix('users')->name('users.')->middleware("can:gerir-utilizador")->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/registar-utilizador', [UserController::class, 'create'])->name('create');
    Route::post('/registar-utilizador', [UserController::class, 'store'])->name('store');
    Route::get('/{utilizador}', [UserController::class, 'show'])->name("show");
    Route::post('/actualizar-dados/{utilizador}', [UserController::class, 'actualizarDados'])->name("actualizar-dados");
    Route::post('/actualizar-password/{utilizador}', [UserController::class, 'actualizarPassword'])->name("actualizar-password");

    Route::prefix("perfil")->name("perfil.")->group(function () {
        Route::get('/ver', [RoleController::class, 'index'])->name("index");
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/create', [RoleController::class, 'store'])->name('store');
        Route::get('/{role}', [RoleController::class, 'show'])->name('show');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::post('/{role}/edit', [RoleController::class, 'update'])->name('update');
        Route::post('/delete', [RoleController::class, 'create'])->name('delete');
    });

});
