<?php

namespace App\Providers;

use App\Services\GenresServiceContract;
use App\Services\impl\GenreService;
use App\Services\impl\MovieService;
use App\Services\impl\ProducerService;
use App\Services\ProducerServiceContract;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\ProducerServiceContract', function () {
            return new ProducerService();
        });

        $this->app->bind('App\Services\GenresServiceContract', function () {
            return new GenreService();
        });

        $this->app->bind('App\Services\MovieServiceContract', function () {

            $genre_service = $this->app->make(GenresServiceContract::class);
            $producer_service = $this->app->make(ProducerServiceContract::class);
            return new MovieService($genre_service, $producer_service);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
