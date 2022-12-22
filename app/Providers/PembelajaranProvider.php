<?php

namespace App\Providers;

use App\Repositories\Eloquent\PembelajaranRepositoryImpl;
use App\Repositories\PembelajaranReposiory;
use App\Repositories\TahunAjaranRepository;
use App\Services\Impl\PembelajaranServiceImpl;
use App\Services\PembelajaranService;
use Illuminate\Support\ServiceProvider;

class PembelajaranProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PembelajaranReposiory::class, PembelajaranRepositoryImpl::class);
        $this->app->singleton(PembelajaranService::class, function ($app) {
            $tahunAjaranRepository = $app->make(TahunAjaranRepository::class);
            $pembelajaranRepository = $app->make(PembelajaranReposiory::class);
            return new PembelajaranServiceImpl($tahunAjaranRepository, $pembelajaranRepository);
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
