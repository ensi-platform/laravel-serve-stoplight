# Laravel Serve Stoplight

Пакет позволяет вывести спецификацию API, настроив только пути до ваших openapi3 конфигов

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

По-умолчанию спецификация v1 доступна по адресу docs/swagger (аналогичный полный путь docs/swagger/v1).

Если нужно открыть спецификацию другой версии, то используйте путь docs/swagger/{version}, например, docs/swagger/v2
