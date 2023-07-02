<?php

namespace App\Providers;

use App\Interfaces\PklRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\KegiatanRepositoryInterface;
use App\Interfaces\KehadiranRepositoryInterface;
use App\Interfaces\KuesionerRepositoryInterface;
use App\Interfaces\PenilaianRepositoryInterface;
use App\Repositories\PklRepository;
use App\Repositories\UserRepository;
use App\Repositories\KegiatanRepository;
use App\Repositories\KehadiranRepository;
use App\Repositories\KuesionerRepository;
use App\Repositories\PenilaianRepository;
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
        $this->app->bind(PenilaianRepositoryInterface::class, PenilaianRepository::class);
        $this->app->bind(KuesionerRepositoryInterface::class, KuesionerRepository::class);
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
