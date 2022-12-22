<?php

namespace App\Providers;

use App\Repositories\Eloquent\SiswaRepositoryImpl;
use App\Repositories\SiswaRepository;
use App\Repositories\UserRepository;
use App\Services\Impl\SiswaServiceImpl;
use App\Services\SiswaService;
use Illuminate\Support\ServiceProvider;

class SiswaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SiswaRepository::class, SiswaRepositoryImpl::class);
        $this->app->singleton(SiswaService::class, function($app) {
            $siswaRepository = $app->make(SiswaRepository::class);
            $userRepository = $app->make(UserRepository::class);
            return new SiswaServiceImpl($siswaRepository, $userRepository);
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
