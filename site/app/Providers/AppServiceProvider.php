<?php

namespace App\Providers;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Repositories\CustomerRepository;
use Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class,CustomerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
