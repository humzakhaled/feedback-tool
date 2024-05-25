<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Feedback\CommentController;
use App\Http\Controllers\Feedback\FeedbackController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('feedbacks', FeedbackController::class)->only(['index', 'create', 'store', 'show']);

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('comments/users', [CommentController::class, 'users'])->name('comments.users');
});

Auth::routes([
    'reset' => false,
    'verify' => false,
]);
