<div class="filament-hidden">

![Filament Queue Management](https://raw.githubusercontent.com/jeffersongoncalves/filament-queue-management/2.x/art/jeffersongoncalves-filament-queue-management.png)

</div>

# Filament Queue Management

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-queue-management.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-queue-management)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-queue-management/tests.yml?branch=2.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-queue-management/actions?query=workflow%3Atests+branch%3A2.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-queue-management/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-queue-management/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-queue-management.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-queue-management)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-queue-management.svg?style=flat-square)](LICENSE.md)

A Filament plugin to manage Laravel's database-driver queue tables (`jobs`, `failed_jobs`, `job_batches`) directly from your panel. It is a Filament UI port of the Nova package `kaiserkiwi/nova-queue-management`, built on top of the framework-agnostic [`jeffersongoncalves/laravel-queue-management`](https://github.com/jeffersongoncalves/laravel-queue-management) core (the queue models and the `QueueManager` service) and the shared [`jeffersongoncalves/filament-plugin-core`](https://github.com/jeffersongoncalves/filament-plugin-core).

## Features

- 📋 Monitor pending jobs (`jobs` table) and prune them individually or in bulk
- ♻️ Retry, retry-all, forget and flush-all failed jobs (`failed_jobs` table)
- 📦 Inspect job batches (`job_batches` table) read-only, including failed job ids and options
- 🔎 Searchable, sortable tables with payload / exception viewers (pretty JSON)
- 🧭 All three resources grouped under a configurable "Queue Management" navigation group
- ⚙️ Fluent customisation of the navigation group label, sort, per-resource slugs and icons

## Compatibility

| Plugin Version                                                                  | Filament | PHP   | Laravel     |
|---------------------------------------------------------------------------------|----------|-------|-------------|
| [1.x](https://github.com/jeffersongoncalves/filament-queue-management/tree/1.x) | ^3.0     | ^8.2  | ^10.0       |
| [2.x](https://github.com/jeffersongoncalves/filament-queue-management/tree/2.x) | ^4.0     | ^8.2  | ^11.0       |
| [3.x](https://github.com/jeffersongoncalves/filament-queue-management/tree/3.x) | ^5.0     | ^8.3  | ^12.0/^13.0 |

## Installation

You can install the package via composer (the `jeffersongoncalves/laravel-queue-management` core is pulled in automatically):

```bash
composer require jeffersongoncalves/filament-queue-management:"^2.0"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-queue-management-config"
```

> This plugin reads Laravel's standard `jobs`, `failed_jobs` and `job_batches` tables. Make sure your application uses the `database` queue driver (and the `database` / `database-uuids` failed job driver) and has run the queue migrations.

## Usage

### Register the plugin

```php
use Filament\Panel;
use JeffersonGoncalves\Filament\QueueManagement\FilamentQueueManagementPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentQueueManagementPlugin::make()
                ->navigationGroup('Queue Management')   // null => translated default label
                ->navigationSort(99)
                ->jobsSlug('jobs')
                ->failedJobsSlug('failed-jobs')
                ->jobBatchesSlug('job-batches')
                ->jobsNavigationIcon('heroicon-o-queue-list')
                ->failedJobsNavigationIcon('heroicon-o-exclamation-triangle')
                ->jobBatchesNavigationIcon('heroicon-o-rectangle-stack'),
        ]);
}
```

All fluent methods are optional and return `$this` for chaining. If you do not register the plugin, the three resources can also be discovered automatically through the package service provider, in which case configuration is read from the published config file.

### Configuration

```php
return [
    'navigation' => [
        'group' => null, // null => translated "Queue Management"
        'sort' => null,
    ],
    'resources' => [
        'jobs' => [
            'slug' => 'jobs',
            'navigation_icon' => 'heroicon-o-queue-list',
        ],
        'failed_jobs' => [
            'slug' => 'failed-jobs',
            'navigation_icon' => 'heroicon-o-exclamation-triangle',
        ],
        'job_batches' => [
            'slug' => 'job-batches',
            'navigation_icon' => 'heroicon-o-rectangle-stack',
        ],
    ],
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
