<?php

namespace App\Providers;

use App\Repositories\DiskusiPembelajaranRepository;
use App\Repositories\Eloquent\DiskusiPembelajaranRepositoryImpl;
use App\Services\DiskusiPembelajaranService;
use App\Services\Impl\DiskusiPembelajaranServiceImpl;
use Illuminate\Support\ServiceProvider;

class DiskusiPembelajaranProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DiskusiPembelajaranRepository::class, DiskusiPembelajaranRepositoryImpl::class);
        $this->app->singleton(DiskusiPembelajaranService::class, function($app) {
            $diskusiRepository = $app->make(DiskusiPembelajaranRepository::class);
            return new DiskusiPembelajaranServiceImpl($diskusiRepository);
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
