<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Spatie\LaravelPdf\Facades\Pdf;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contacts Route
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');


    // Pdf::view('myPDF', ['data' => $data])
    //     ->format('a4')
    //     ->save('export.pdf');

});

require __DIR__.'/auth.php';
