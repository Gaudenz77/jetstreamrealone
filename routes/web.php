<?php

use App\Http\Controllers\PresentsController;
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

// Define the route with the name 'testsiteone'
Route::get('/testsiteone', function () {
    return view('testsiteone');
})->name('testsiteone');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/create', function () {
        return view('create'); // Assuming 'create.blade.php' is in your views directory
    })->name('create'); 

    Route::get('/testsiteone', function () {
        return view('testsiteone'); // Assuming 'create.blade.php' is in your views directory
    })->name('testsiteone'); 

    Route::get('/showroom', function () {
        return view('showroom');
    })->name('showroom');
    
    // Add the routes for creating and storing gifts
    Route::get('/gifts/create', [PresentsController::class, 'create'])->name('gifts.create');
    Route::post('/gifts', [PresentsController::class, 'store'])->name('gifts.store');
    Route::get('/testsiteone', [PresentsController::class, 'index'])->name('testsiteone');
    Route::delete('/gifts/{gift}', [PresentsController::class, 'destroy'])->name('gifts.destroy');

    Route::post('/filter', [PresentsController::class, 'filter'])->name('gifts.filter');



});