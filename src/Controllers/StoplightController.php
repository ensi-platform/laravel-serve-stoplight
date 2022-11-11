<?php

namespace Ensi\LaravelServeStoplight\Controllers;

use cebe\openapi\Reader;
use cebe\openapi\spec\OpenApi;
use cebe\openapi\SpecObjectInterface;
use cebe\openapi\Writer;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use LogicException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoplightController
{
    public function documentation(?string $version = null): View
    {
        $version = $version ?? config('serve-stoplight.default_version');

        return view('serve-stoplight::stoplight', $this->url($version));
    }

    public function yaml(string $version): Response
    {
        $url = $this->url($version);
        $spec = $this->parseSpec(base_path('public/' . $url['url']));
        $spec = $this->addPrefix($spec);
        $yaml = Writer::writeToYaml(new OpenApi($spec));

        return (new Response($yaml, 200, [
            'Content-Type' => 'text/yaml',
        ]));
    }

    protected function parseSpec(string $sourcePath): array
    {
        $spec = match (substr($sourcePath, -5)) {
            '.yaml' => Reader::readFromYamlFile($sourcePath),
            '.json' => Reader::readFromJsonFile($sourcePath),
            default => throw new LogicException("You should specify .yaml or .json file as a source. \"$sourcePath\" was given instead"),
        };

        return json_decode(json_encode($spec->getSerializableData(), true));
    }

    protected function addPrefix(array $spec): array
    {
        foreach ($spec["servers"] as $i => $server) {
            $spec["servers"][$i]["url"] = config("serve-stoplight.prefix") . $server["url"];
        }

        return $spec;
    }

    protected function url(string $version): array
    {
        $urls = config('serve-stoplight.urls');
        if (isset($urls[$version])) {
            return array_merge($urls[$version], ['version' => $version]);
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
