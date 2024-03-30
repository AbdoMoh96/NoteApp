<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\NoteController;


Route::controller(NoteController::class)->prefix('notes')->name('notes.')->group(function (){
    Route::post('/', 'index')->name('get');
    Route::post('/find', 'filter')->name('filter');
    Route::post('/create', 'store')->name('create');
    Route::put('/update', 'update')->name('update');
    Route::delete('/destroy', 'destroy')->name('destroy');
});
