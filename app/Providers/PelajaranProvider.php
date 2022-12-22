<?php

namespace App\Providers;

use App\Repositories\Eloquent\PelajaranRepositoryImpl;
use App\Repositories\PelajaranRepository;
use Illuminate\Support\ServiceProvider;

class PelajaranProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PelajaranRepository::class, PelajaranRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
