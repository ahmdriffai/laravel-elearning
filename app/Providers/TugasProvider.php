<?php

namespace App\Providers;

use App\Repositories\Eloquent\TugasRepositoryImpl;
use App\Repositories\TugasRepository;
use App\Services\Impl\TugasServiceImpl;
use App\Services\TugasService;
use Illuminate\Support\ServiceProvider;

class TugasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TugasRepository::class, TugasRepositoryImpl::class);
        $this->app->singleton(TugasService::class, function($app) {
            $tugasRepository = $app->make(TugasRepository::class);
            return new TugasServiceImpl($tugasRepository);
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
