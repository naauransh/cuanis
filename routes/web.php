
<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

   Route::get('/transaksi', \App\Livewire\TransaksiIndex::class)
    ->name('transaksi.index');

    Route::get('/transaksi/tambah', \App\Livewire\TransaksiCreate::class)
        ->name('transaksi.create');

    // EDIT TRANSAKSI
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])
        ->name('transaksi.edit');

    // UPDATE TRANSAKSI
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])
        ->name('transaksi.update');

    // HAPUS TRANSAKSI
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])
        ->name('transaksi.destroy');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');

});
