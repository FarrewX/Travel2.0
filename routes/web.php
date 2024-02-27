<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\resources\js\Pages\HomePage;
use App\resources\js\Pages\Contact;
use Inertia\Inertia;

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
    return Inertia::render('HomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/planner', function () {
        return Inertia::render('Planner');
    })->name('Planner');
    
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('Contact');


Route::get('/home', function () {
    return Inertia::render('HomePage');
})->name('home');

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

Route::get('/bar', function () {
    return Inertia::render('Navbar');
})->name('bar');

Route::get('/carousel', function () {
    return Inertia::render('Carousel');
})->name('carousel');

Route::get('/popular', function () {
    return Inertia::render('popular');
})->name('popular');