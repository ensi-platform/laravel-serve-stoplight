<?php

namespace Ensi\LaravelServeStoplight\Controllers;

use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoplightController
{
    public function documentation(?string $version = null): View
    {
        $version = $version ?? config('serve-stoplight.default_version');

        return view('serve-stoplight::stoplight', $this->url($version));
    }

    protected function url(string $version): array
    {
        $urls = config('serve-stoplight.urls');
        if (isset($urls[$version])) {
            return $urls[$version];
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function asset(string $asset, string $ext): Response
    {
        $assetFile = $asset . '.' . $ext;
        $path = $this->distPath($assetFile);

        return (new Response(file_get_contents($path), 200, [
            'Content-Type' => (pathinfo($path))['extension'] == 'css' ? 'text/css' : 'application/javascript',
        ]))->setSharedMaxAge(31536000)
            ->setMaxAge(31536000)
            ->setExpires(new DateTime('+1 year'));
    }

    protected function distPath(string $asset = null): string
    {
        $allowedFiles = [
            'web-components.min.js',
            'styles.min.css',
        ];

        $path = base_path('vendor/ensi/laravel-serve-stoplight/packages/elements/dist/');

        if (!$asset) {
            return realpath($path);
        }

        if (!in_array($asset, $allowedFiles)) {
            throw new NotFoundHttpException();
        }

        return realpath($path . $asset);
    }
}
