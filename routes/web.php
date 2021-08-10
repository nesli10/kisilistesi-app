<?php

use App\Http\Controllers\kayitController;
use Illuminate\Support\Facades\Route;

Route::get('/kisi',[kayitController::class,'Index']);
Route::view('/', 'anasayfa');
Route::get('/adres/{tc?}', [kayitController::class, 'adres'])->name('adres');
Route::post('/formKaydet', [kayitController::class, 'formKaydet'])->name('formKaydet');
Route::get('/Sil/{tc?}', [kayitController::class, 'veriSil'])->name('veriSil');
Route::post('/guncelle', [kayitController::class, 'guncelle'])->name('guncelle');
Route::get('/guncellen/{tc?}', [kayitController::class, 'guncellen'])->name('guncellen');
Route::post('/adresekle', [kayitController::class, 'adresekle'])->name('adresekle');
