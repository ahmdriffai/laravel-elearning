<?php

namespace App\Providers;

use App\Repositories\Eloquent\GuruRepositoryImpl;
use App\Repositories\GuruRepository;
use App\Repositories\UserRepository;
use App\Services\GuruService;
use App\Services\Impl\GuruServiceImpl;
use Illuminate\Support\ServiceProvider;

class GuruProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GuruRepository::class, GuruRepositoryImpl::class);
        $this->app->singleton(GuruService::class, function($app) {
            $guruRepository = $app->make(GuruRepository::class);
            $userRepository = $app->make(UserRepository::class);
            return new GuruServiceImpl($guruRepository, $userRepository);
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
