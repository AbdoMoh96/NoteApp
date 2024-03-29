<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('ide:help', function () {
    Artisan::call('ide-helper:generate');
    Artisan::call('ide-helper:meta');
})->purpose('generate facade and model documentation for ide');


Artisan::command('model:help', function () {
    Artisan::call('ide-helper:models', ['--write' => 'yes']);
})->purpose('generate facade and model documentation for ide');
