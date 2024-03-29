<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\logged\ShortUrlController;
use App\Http\Controllers\public\RedirectController;
use App\Models\Redirect;

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
    return redirect('/register');
});


/**
 * ===================
 * área logada do site
 * ===================
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/make-url');
    })->name('dashboard');

    Route::get('/make-url', [ShortUrlController::class, 'makeUrl'])->name('url.make');
    Route::get('/save-url', [ShortUrlController::class, 'saveUrl'])->name('url.save');
});

/**
 * ===================
 * área pública do site
 * ===================
 */
Route::get('/re/{urlCode}', [RedirectController::class, 'redirect'])->name('redirect');
