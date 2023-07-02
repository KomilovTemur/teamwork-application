<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectContoller;
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
    return view('index');
});
Route::get("/dashboard", [ProjectContoller::class, 'index'])->middleware('auth')->name('dashboard');
Route::prefix('dashboard')->middleware(['auth', 'OwnerProject'])->group(function () {
    Route::resource('projects', ProjectContoller::class);
    Route::resource('members', MemberController::class);
    Route::resource('comments', CommentController::class);
})->name('dashboard.');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';