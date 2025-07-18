<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Livewire\Questions\QuestionIndex;
use App\Livewire\Questions\QuestionCreate;
use App\Livewire\Questions\QuestionEdit;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('questions', QuestionIndex::class)->name('questions.index');
    Route::get('create', QuestionCreate::class)->name('questions.create');
    Route::get('edit/{id}', QuestionEdit::class)->name('questions.edit');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// For Quiz
Route::get('/quiz', function(){
    return "Hello Quiz";
});


require __DIR__.'/auth.php';
