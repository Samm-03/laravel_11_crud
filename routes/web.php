<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
 return view('welcome');
});
Route::resource('products', ProductController::class);


// Public routes: Login and Register forms
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Authentication routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes, only accessible by authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('products.index');
    });
    Route::resource('products', ProductController::class);
});


// Show login form with GET
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');

// Handle login form submission with POST
Route::post('/login', [AuthController::class, 'login']);



Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register POST route
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('profile.dashboard');
})->middleware('auth')->name('dashboard');

