<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Support;

use Illuminate\Support\HtmlString;

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

    /**
     * Render a job payload as escaped, pretty-printed JSON inside a <pre> block.
     *
     * @param  array<mixed>|null  $payload
     */
    public static function formatPayload(?array $payload): HtmlString
    {
        $json = (string) json_encode(
            self::decodePayload($payload ?? []),
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE,
        );

        return new HtmlString('<pre style="white-space: pre-wrap; word-break: break-all;">'.e($json).'</pre>');
    }

    /**
     * Recursively expand PHP-serialized strings (e.g. `data.command`) found in a job payload
     * into plain arrays, so they can be displayed as readable JSON.
     */
    public static function decodePayload(mixed $value): mixed
    {
        if (is_string($value) && preg_match('/^(?:[aOsidb]:|N;)/', $value)) {
            // allowed_classes=false: no class is instantiated, so no __wakeup/__destruct runs on payload data.
            $decoded = @unserialize($value, ['allowed_classes' => false]);

            if ($decoded !== false || $value === 'b:0;') {
                $value = $decoded;
            }
        }

        if (is_object($value)) {
            $properties = [];

            foreach ((array) $value as $key => $property) {
                // Strip the "\0*\0" / "\0Class\0" prefixes PHP adds to protected/private property names.
                $properties[(string) preg_replace('/^\0.+\0/', '', (string) $key)] = $property;
            }

            $class = $properties['__PHP_Incomplete_Class_Name'] ?? $value::class;
            unset($properties['__PHP_Incomplete_Class_Name']);

            $value = ['__class' => $class] + $properties;
        }

        return is_array($value) ? array_map(self::decodePayload(...), $value) : $value;
    }
}
