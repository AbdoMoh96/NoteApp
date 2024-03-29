<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\NoteController;


Route::controller(NoteController::class)->prefix('notes')->name('notes.')->group(function (){
    Route::get('/', 'index')->name('get');
});
