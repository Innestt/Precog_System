<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PredictionController;

// Login routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Home route for authenticated users
Route::middleware('auth')->get('/home', function () {
    return view('home');  // Your custom home page for logged-in users
})->name('home');

// Default homepage for unauthenticated users
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');  // Redirect authenticated users to the home page
    }
    return view('welcome');  // Show the welcome page for unauthenticated users
});

// About route
Route::get('/about', function () {
    return view('about');  // This will return the about.blade.php view
});

// Contact route
Route::get('/contact', function () {
    return view('contact');  // This will return the contact.blade.php view
});

// Search routes for car model
Route::middleware('auth')->group(function () {
    // Route for displaying the search form (GET)
    Route::get('/search', [CarController::class, 'showSearchPage'])->name('search');

    // Route for posting search form data to get car price prediction (POST)
    Route::post('/search', [PredictionController::class, 'predict'])->name('predict');
    
    // AJAX search route (if needed for car search functionality)
    Route::post('/search-car', [CarController::class, 'search'])->name('search.car');
});
