<?php

namespace Ensi\LaravelServeStoplight;

use Ensi\LaravelServeStoplight\Controllers\StoplightController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ServeStoplightServiceProvider extends ServiceProvider
{
    /**
     * Выполнение после-регистрационной загрузки сервисов.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/serve-stoplight.php' => config_path('serve-stoplight.php')]);
        $this->mergeConfigFrom(__DIR__ . '/../config/serve-stoplight.php', 'serve-stoplight');

        $this->loadViewsFrom(__DIR__ . '/views', 'serve-stoplight');

        Route::namespace('Ensi\LaravelServeStoplight\Controllers')
            ->name('serve-stoplight.')
            ->prefix(config('serve-stoplight.path'))
            ->group(function () {
                Route::get('assets/{asset}/{ext}', [StoplightController::class, 'asset'])->name('asset');
                Route::get('{version?}', [StoplightController::class, 'documentation']);
            });
    }
}