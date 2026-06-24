<?php

use Filament\Facades\Filament;
use JeffersonGoncalves\Filament\QueueManagement\FilamentQueueManagementPlugin;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\FailedJobResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\JobBatchResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\JobResource;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;

it('extends the shared base plugin', function () {
    expect(FilamentQueueManagementPlugin::make())->toBeInstanceOf(BasePlugin::class);
});

it('has the expected id', function () {
    expect(FilamentQueueManagementPlugin::make()->getId())->toBe('filament-queue-management');
});

it('is resolvable from the panel via get()', function () {
    expect(FilamentQueueManagementPlugin::get())->toBeInstanceOf(FilamentQueueManagementPlugin::class);
});

it('registers the three queue resources on the panel', function () {
    $resources = Filament::getPanel('admin')->getResources();

    expect($resources)
        ->toContain(JobResource::class)
        ->toContain(FailedJobResource::class)
        ->toContain(JobBatchResource::class);
});

it('exposes fluent configuration methods returning self', function () {
    $plugin = FilamentQueueManagementPlugin::make();

    expect($plugin->navigationGroup('Custom'))->toBe($plugin)
        ->and($plugin->navigationSort(5))->toBe($plugin)
        ->and($plugin->jobsSlug('my-jobs'))->toBe($plugin)
        ->and($plugin->failedJobsSlug('my-failed'))->toBe($plugin)
        ->and($plugin->jobBatchesSlug('my-batches'))->toBe($plugin)
        ->and($plugin->jobsNavigationIcon('heroicon-o-bolt'))->toBe($plugin)
        ->and($plugin->failedJobsNavigationIcon('heroicon-o-bolt'))->toBe($plugin)
        ->and($plugin->jobBatchesNavigationIcon('heroicon-o-bolt'))->toBe($plugin);
});
