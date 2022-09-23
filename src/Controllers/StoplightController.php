<?php

namespace Ensi\LaravelServeStoplight\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoplightController
{
    public function documentation(?string $version): View
    {
        $version = $version ?? config('serve-stoplight.default_version');

        $urls = config('serve-stoplight.urls');
        if (isset($urls[$version])) {
            $url = $urls[$version];

            return view('serve-stoplight::stoplight', $url);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
