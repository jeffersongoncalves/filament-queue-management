<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Support;

class Utils
{
    public static function getNavigationGroup(): ?string
    {
        $group = config('filament-queue-management.navigation.group');

        if (filled($group)) {
            return $group;
        }

        return __('filament-queue-management::filament-queue-management.navigation.group');
    }

    public static function getNavigationSort(): ?int
    {
        $sort = config('filament-queue-management.navigation.sort');

        return $sort === null ? null : (int) $sort;
    }

    public static function getJobsSlug(): string
    {
        return (string) config('filament-queue-management.resources.jobs.slug', 'jobs');
    }

    public static function getFailedJobsSlug(): string
    {
        return (string) config('filament-queue-management.resources.failed_jobs.slug', 'failed-jobs');
    }

    public static function getJobBatchesSlug(): string
    {
        return (string) config('filament-queue-management.resources.job_batches.slug', 'job-batches');
    }

    public static function getJobsNavigationIcon(): string
    {
        return (string) config('filament-queue-management.resources.jobs.navigation_icon', 'heroicon-o-queue-list');
    }

    public static function getFailedJobsNavigationIcon(): string
    {
        return (string) config('filament-queue-management.resources.failed_jobs.navigation_icon', 'heroicon-o-exclamation-triangle');
    }

    public static function getJobBatchesNavigationIcon(): string
    {
        return (string) config('filament-queue-management.resources.job_batches.navigation_icon', 'heroicon-o-rectangle-stack');
    }
}
