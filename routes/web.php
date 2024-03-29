<?php

use App\Http\Controllers\MacroProcessesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use Illuminate\Auth\Events\Verified;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/', function () {
        return  view('showDashboard');
    })->name('dashboard')->middleware('auth');

    Route::get('/download-file/{id}', 'Dashboard@downloadFile')->name('download.file');
});


Route::get('/macroprocesos', function () {
    return  view('macroprocesses.show');
})->name('macroprocess')->middleware('auth');

Route::get('/areas', function () {
    return view('areas.show');
})->name('areas')->middleware('auth');


Route::get('/attachment-show/{id}', function () {
    return view('attachments');
})->name('attachment-show');
