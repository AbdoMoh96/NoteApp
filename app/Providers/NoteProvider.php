<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\NoteRepository;
use App\Repositories\NoteRepositoryImp;

class NoteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        app()->bind(NoteRepository::class, NoteRepositoryImp::class);
    }
}
