<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [DashboardController::class, 'index']); //from routeserviceprovider call it will call the index in the dashboard controller, 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/bookings', [DashboardController::class, 'bookings'])->middleware(['auth','admin']);
Route::get('/manage', [DashboardController::class, 'manage'])->middleware(['auth','admin']);


require __DIR__.'/auth.php';

Route::get('/reserve', [DashboardController::class, 'reserve'])->middleware('auth',);

Route::post('/user_reserve', [DashboardController::class, 'user_reserve'])->middleware('auth');

Route::get('/my-reservations', [DashboardController::class, 'myReservations'])->middleware('auth');

Route::get('/cancel-reservation/{id}', [DashboardController::class, 'cancelReservation'])->middleware('auth');

//edit page
Route::get('/edit-reservation/{id}', [DashboardController::class, 'editReservation'])->middleware('auth');

Route::post('/update-reservation/{id}', [DashboardController::class, 'updateReservation'])->middleware('auth')->name('update_reservation');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/bookings', [AdminController::class, 'showBookings'])->name('admin.bookings');
    Route::post('/admin/approve-reservation/{id}', [AdminController::class, 'approveReservation'])->name('admin.approveReservation');
    Route::post('/admin/reject-reservation/{id}', [AdminController::class, 'rejectReservation'])->name('admin.rejectReservation');
});

Route::get('/reserve', [DashboardController::class, 'showForm'])->middleware('auth');

