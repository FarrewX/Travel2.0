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
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
    Route::get('/page', function () {
        return Inertia::render('start/UserLocation');
    })->name('page');

    Route::get('/geocode', function () {
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => request('address'),
            'key' => config('services.google.maps.api_key'), // Replace with your API key
            
        ]);
    
        return $response->json();
    });
    
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('Contact');


Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

Route::get('/carousel', function () {
    return Inertia::render('Carousel');
})->name('carousel');

Route::get('/popular', function () {
    return Inertia::render('popular');
})->name('popular');

Route::get('/profile-photos/{filename}', function ($filename) {
    // กำหนด path ของโฟลเดอร์ที่เก็บรูปภาพโปรไฟล์
    $path = storage_path('app/public/profile-photos/' . $filename);

    // ตรวจสอบว่าไฟล์ภาพนั้นมีอยู่จริงหรือไม่
    if (!file_exists($path)) {
        abort(404);
    }

    // อ่านไฟล์ภาพและส่งคืนเป็น response ประเภท image/jpeg หรืออื่น ๆ ตามประเภทของไฟล์ภาพ
    return response()->file($path);
});

Route::middleware('auth:sanctum')->get('/detailpage', function () {
    return Inertia::render('Reserve');
})->name('detailpage');

Route::get('/UX', function () {
    return Inertia::render('UX/1');
})->name('UX');
// php artisan storage:link

/*Route::middleware('auth:sanctum')->get('/geocode', function () {
    $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
        'address' => request('address'),
        'key' => config('services.google.maps.api_key'), // Replace with your API key
        
    ]);

    return $response->json();
});*/

