<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Contact as Contact;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::post('/contacts/create',[ContactController::class,'store'])->name('contacts.store'); 

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

Route::get('/contacts/{id}', [ContactController::class,'show'])->name('contacts.show');
