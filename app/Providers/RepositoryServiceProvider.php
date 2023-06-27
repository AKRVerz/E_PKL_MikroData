<?php

namespace App\Providers;

use App\Interfaces\JurnalRepositoryInterface;
use App\Interfaces\PklRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\JurnalRepository;
use App\Repositories\PklRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(JurnalRepositoryInterface::class, JurnalRepository::class);
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
