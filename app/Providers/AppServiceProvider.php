<?php

namespace App\Providers;

use App\Search\Projects;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param \ConsoleTVs\Charts\Registrar $charts
     * @return void
     */
    public function boot(Charts $charts)
    {
        // Register charts
        $charts->register([
            \App\Charts\LoginChart::class,
            \App\Charts\TasksChart::class,
            \App\Charts\ProjectsChart::class
        ]);
        Projects::bootSearchable();
    }
}
