<?php

namespace App\Providers;

use App\Repositories\Eloquent\KelasRepositoryImpl;
use App\Repositories\KelasRepository;
use Illuminate\Support\ServiceProvider;

class KelasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(KelasRepository::class, KelasRepositoryImpl::class);
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
