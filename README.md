# Laravel Serve Stoplight

Пакет позволяет вывести спецификацию API, настроив только пути до ваших openapi3 конфигов.

Реализован на базе [stoplightio/elements](https://github.com/stoplightio/elements)

## Установка

1. `composer require ensi/laravel-serve-stoplight`
2. Добавьте `Ensi\LaravelServeStoplight\ServeStoplightServiceProvider::class` в Package Service Providers в `config/app.php`
3. Скопируйте себе `config/serve-stoplight.php` и настройте путь для роутинга и массив ссылок до ваших openapi3 конфигов

## Формат массива urls в конфиге 

```
'urls' => [
    [
        'url' => '/api-docs/v1/index.yaml', // Путь, осносительно public c / в начале
        'name' => 'API v1' // Название для отображения в интерфейсе
    ],
],
```

## Просмотр спецификации

По-умолчанию спецификация v1 доступна по адресу docs/oas (аналогичный полный путь docs/oas/v1).

Если нужно открыть спецификацию другой версии, то используйте путь docs/oas/{version}, например, docs/oas/v2
