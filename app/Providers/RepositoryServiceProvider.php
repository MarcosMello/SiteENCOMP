<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(\App\Repository\Interfaces\UserRepositoryInterface::class, \App\Repository\UserRepository::class);
        $this->app->singleton(\App\Repository\Interfaces\AddressRepositoryInterface::class, \App\Repository\AddressRepository::class);
        $this->app->singleton(\App\Repository\Interfaces\ClientRepositoryInterface::class, \App\Repository\ClientRepository::class);
        $this->app->singleton(\App\Repository\Interfaces\LogRepositoryInterface::class, \App\Repository\LogRepository::class);
    }
}
