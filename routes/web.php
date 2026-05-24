<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;

// ==================== HALAMAN UTAMA ====================
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

// ==================== BLOG PUBLIK ====================
Route::get('/articles', [ArtikelController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArtikelController::class, 'show'])->name('articles.show');

// ==================== ADMIN (dilindungi auth) ====================
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/artikel', [ArtikelController::class, 'adminIndex'])->name('admin.artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');
});

// ==================== AUTHENTICATION ====================
Auth::routes();

// ==================== HALAMAN HOME & PROFIL USER ====================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ==================== HALAMAN PROFIL PENULIS (STATIS) ====================
Route::get('/profil-penulis', function () {
    $author = [
        'name' => 'Muftia Ayu Khoirunnisa',
        'email' => 'muftiaayu01@gmail.com',
        'education' => 'UIN Salatiga',
        'age' => '21 tahun',
        'birth' => 'Riau, 1 Oktober 2005'
    ];
    return view('profil_penulis', compact('author'));
})->name('profil.penulis');