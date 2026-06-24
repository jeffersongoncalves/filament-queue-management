<?php

use JeffersonGoncalves\Filament\QueueManagement\FilamentQueueManagementServiceProvider;
use JeffersonGoncalves\Filament\QueueManagement\Support\Utils;
use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;

it('extends the shared base package service provider', function () {
    $provider = new FilamentQueueManagementServiceProvider(app());

    expect($provider)->toBeInstanceOf(BasePackageServiceProvider::class);
});

it('loads the package translations', function () {
    expect(__('filament-queue-management::filament-queue-management.navigation.group'))
        ->toBe('Queue Management');
});

it('resolves the navigation group from translations by default', function () {
    expect(Utils::getNavigationGroup())->toBe('Queue Management');
});

it('honours config overrides for slugs and icons', function () {
    config()->set('filament-queue-management.resources.jobs.slug', 'custom-jobs');
    config()->set('filament-queue-management.resources.jobs.navigation_icon', 'heroicon-o-bolt');

    expect(Utils::getJobsSlug())->toBe('custom-jobs')
        ->and(Utils::getJobsNavigationIcon())->toBe('heroicon-o-bolt');
});
