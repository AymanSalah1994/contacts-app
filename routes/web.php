<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Contact as Contact;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Settings\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('contacts/{contact}/update', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('contacts/{contact}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');






Auth::routes(['verify' => true]);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware('auth')->group(function () {}) ; 
Route::get('/settings/account', [AccountController::class, 'index']);
