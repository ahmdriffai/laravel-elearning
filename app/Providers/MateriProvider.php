<?php

namespace App\Providers;

use App\Repositories\Eloquent\MateriRepositoryImpl;
use App\Repositories\MateriRepository;
use App\Services\Impl\MateriServiceImpl;
use App\Services\MateriService;
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
        $this->app->singleton(MateriService::class, function ($app) {
            $materiRepository = $app->make(MateriRepository::class);
            return new MateriServiceImpl($materiRepository);
        });
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
