<?php

namespace App\Providers;

use App\Repository\Attendee_CoffeeBreakRepository;
use App\Repository\AttendeeRepository;
use App\Repository\CoffeeBreakRepository;
use App\Repository\Event_Ticket_CoffeeBreakRepository;
use App\Repository\Interfaces\Attendee_CoffeeBreakRepositoryInterface;
use App\Repository\Interfaces\AttendeeRepositoryInterface;
use App\Repository\Interfaces\CoffeeBreakRepositoryInterface;
use App\Repository\Interfaces\Event_Ticket_CoffeeBreakRepositoryInterface;
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
        $this->app->singleton(\App\Repository\Interfaces\LogRepositoryInterface::class, \App\Repository\LogRepository::class);

        $this->app->singleton(AttendeeRepositoryInterface::class, AttendeeRepository::class);
        $this->app->singleton(Attendee_CoffeeBreakRepositoryInterface::class, Attendee_CoffeeBreakRepository::class);
        $this->app->singleton(CoffeeBreakRepositoryInterface::class, CoffeeBreakRepository::class);
        $this->app->singleton(Event_Ticket_CoffeeBreakRepositoryInterface::class, Event_Ticket_CoffeeBreakRepository::class);
    }
}
