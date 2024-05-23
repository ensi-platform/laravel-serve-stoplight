# Laravel Serve Stoplight

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ensi/laravel-serve-stoplight.svg?style=flat-square)](https://packagist.org/packages/ensi/laravel-serve-stoplight)
[![Tests](https://github.com/ensi-platform/laravel-serve-stoplight/actions/workflows/run-tests.yml/badge.svg?branch=master)](https://github.com/ensi-platform/laravel-serve-stoplight/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/ensi/laravel-serve-stoplight.svg?style=flat-square)](https://packagist.org/packages/ensi/laravel-serve-stoplight)

The package allows you to output the Stoplight UI by configuring only the paths to your openapi3 configs

Based on [stoplight/elements](https://www.npmjs.com/package/@stoplight/elements)

## Installation

You can install the package via composer:

```bash
composer require ensi/laravel-serve-stoplight
```

Publish config file like this:

```bash
php artisan vendor:publish --provider="Ensi\LaravelServeStoplight\ServeStoplightServiceProvider"
```

Configure `config/serve-stoplight.php`

## Version Compatibility

| Laravel Serve Stoplight | Laravel                              | PHP  | Stoplight |
|-------------------------|--------------------------------------|------|-----------|
| ^0.1.0                  | ^8.0 \|\| ^9.0                       | ^8.0 | 7.7.2     |
| ^0.1.5                  | ^8.0 \|\| ^9.0 \|\| ^10.0            | ^8.0 | 7.7.2     |
| ^0.1.7                  | ^8.0 \|\| ^9.0 \|\| ^10.0 \|\| ^11.0 | ^8.0 | 7.7.2     |
| ^0.2.0                  | ^9.0 \|\| ^10.0 \|\| ^11.0           | ^8.1 | 8.1.3     |

## Basic usage

By default, the `v1` specification is available at `docs/oas` (the same full path as `docs/oas/v1`).

If you need to open a specification of another version, use the `docs/os/{version}` path, for example, `docs/os/v2`

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

### Update stoplight

For update stoplight:
1. update `stoplight-resources/web-components.min.js` from https://unpkg.com/@stoplight/elements/web-components.min.js
2. update `stoplight-resources/styles.min.css` from https://unpkg.com/@stoplight/elements/styles.min.css
3. update current Stoplight version on `Version Compatibility`

### Testing

1. composer install
2. composer test

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.