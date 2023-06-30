<?php

namespace App\Providers;

use App\Interfaces\PklRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\KegiatanRepositoryInterface;
use App\Interfaces\KehadiranRepositoryInterface;
use App\Repositories\PklRepository;
use App\Repositories\UserRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\KehadiranRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PklRepositoryInterface::class, PklRepository::class);
        $this->app->bind(KegiatanRepositoryInterface::class, KegiatanRepository::class);
        $this->app->bind(KehadiranRepositoryInterface::class, KehadiranRepository::class);
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
