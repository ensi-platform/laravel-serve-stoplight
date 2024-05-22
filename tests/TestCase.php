<?php

namespace Ensi\LaravelServeStoplight\Tests;

use Ensi\LaravelServeStoplight\ServeStoplightServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ServeStoplightServiceProvider::class,
        ];
    }
}
