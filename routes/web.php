<?php

use App\Http\Controllers\MacroProcessesController;
use Illuminate\Support\Facades\Route;
use Livewire\Redirector;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(MacroProcessesController::class)->middleware('auth')->group(function () {
    Route::get('/macroprocesos', 'index')->name('macroprocess');
    Route::post('/macroprocesos', 'store')->name('macroprocess.store');
});
