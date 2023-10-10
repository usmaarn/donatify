<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;

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

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/donations', \App\Livewire\Donation\Index::class)->name('donations.all');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('/donations/create', \App\Livewire\Donation\Create::class)->name('donations.create');

    Route::post('/logout', function (\Illuminate\Http\Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

Route::get('/donations/{donation:id}', \App\Livewire\Donation\Show::class)->name('donations.show');
Route::get('/donations/{donation:id}/donate', \App\Livewire\Donation\Donate::class)->name('donations.donate');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
