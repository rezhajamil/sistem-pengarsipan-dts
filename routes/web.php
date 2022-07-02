<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::resource('edit_profile', EditProfileController::class);
    Route::get('/password/change', [PasswordController::class, 'edit'])->name('password.change');
    Route::put('/password/change', [PasswordController::class, 'update'])->name('password.change');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('ensureUserRole:admin')->name('dashboard');
    Route::prefix('admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('event', EventController::class);
        Route::resource('event_participant', EventParticipantController::class);
    });
    Route::prefix('super')->name('super.')->middleware('ensureUserRole:super_admin')->group(function () {
        Route::put('/user/change_role/{id}', [DashboardController::class, 'changeRole'])->name('change_role');
    });
    Route::prefix('user')->name('user.')->middleware('ensureUserRole:user')->group(function () {
        Route::middleware('verified')->group(function () {
            Route::post('/event/register', [EventParticipantController::class, 'register'])->name('event.register');
        });
    });
});

require __DIR__ . '/auth.php';
