<?php

namespace App\Providers;

use App\Repositories\Eloquent\MateriRepositoryImpl;
use App\Repositories\MateriRepository;
use Illuminate\Support\ServiceProvider;

class MateriProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MateriRepository::class, MateriRepositoryImpl::class);
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
