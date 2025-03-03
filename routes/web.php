<?php

use App\Http\Controllers\NuclearpediaController;
use App\Http\Controllers\UploadNuclearpediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [NuclearpediaController::class, 'index'])->name('landing_page.index');
Route::get('/nuclearpedia', [NuclearpediaController::class, 'index'])->name('nuclearpedia.index');
Route::get('/nuclearpedia/{slug}', [NuclearpediaController::class, 'showDetailBySlug'])->name('nuclearpedia.detail');
Route::get('/nuclearpedia/{id}', [NuclearpediaController::class, 'showDetailById'])->name('nuclearpedia.detail');
Route::get('/upload', [UploadNuclearpediaController::class, 'create'])->name('nuclearpedia.create');
Route::post('/upload', [UploadNuclearpediaController::class, 'store'])->name('nuclearpedia.store');
// Route::get('/', [UserController::class, 'profile'])->name('Template.topbar');   