<?php

namespace JeffersonGoncalves\Filament\QueueManagement;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentQueueManagementServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-queue-management';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations();
    }
}
