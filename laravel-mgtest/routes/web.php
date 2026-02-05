<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('tours/Index');
})->name('home');

// Tours pages (Inertia)
Route::get('/tours', function () {
    return Inertia::render('tours/Index');
})->name('tours.index');

Route::get('/tours/create', function () {
    return Inertia::render('tours/Create');
})->name('tours.create');

Route::get('/tours/{id}', function ($id) {
    return Inertia::render('tours/Show');
})->name('tours.show');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
