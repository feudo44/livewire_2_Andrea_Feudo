<?php

use App\Livewire\ArticleCreate;
use App\Livewire\ArticleEdit;
use App\Livewire\ArticleIndex;
use App\Livewire\ArticleShow;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage')->name('home');

Route::get('/articles', ArticleIndex::class)->name('articles.index');

// Solo utenti loggati
Route::middleware('auth')->group(function () {
    Route::get('/articles/create', ArticleCreate::class)->name('articles.create');
    Route::get('/articles/{article}/edit', ArticleEdit::class)->name('articles.edit');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});

// Dettaglio articolo: DOPO le rotte /articles/create e /articles/{article}/edit
Route::get('/articles/{article}', ArticleShow::class)
    ->whereNumber('article')
    ->name('articles.show');

// Solo ospiti
Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});