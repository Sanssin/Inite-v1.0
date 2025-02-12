<?php

use App\Http\Controllers\NuclearpediaController;
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
