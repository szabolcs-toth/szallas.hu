<?php

namespace App\Providers;

use App\Interfaces\CompaniesRepositoryInterface;
use App\Repositories\CompaniesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CompaniesRepositoryInterface::class,CompaniesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
