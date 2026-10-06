<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Support;

use Illuminate\Support\HtmlString;
use LengthException;

class Utils
{
    protected const MAX_DECODE_DEPTH = 128;

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
     * Render a job payload (or any array / serialized string) as escaped, pretty-printed JSON inside a <pre> block.
     */
    public static function formatPayload(mixed $payload): HtmlString
    {
        try {
            $decoded = self::decodePayload($payload ?? []);
        } catch (LengthException) {
            $decoded = $payload;
        }

        // JSON_PARTIAL_OUTPUT_ON_ERROR: values JSON can't represent (e.g. INF) become 0 instead of blanking the whole payload.
        $json = (string) json_encode(
            $decoded,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE | JSON_PARTIAL_OUTPUT_ON_ERROR,
        );

        return new HtmlString('<pre style="white-space: pre-wrap; word-break: break-all;">'.e($json).'</pre>');
    }

    /**
     * Recursively expand PHP-serialized strings (e.g. `data.command`) found in a job payload
     * into plain arrays, so they can be displayed as readable JSON.
     *
     * @throws LengthException when nesting exceeds MAX_DECODE_DEPTH outside any serialized string
     */
    public static function decodePayload(mixed $value, int $depth = 0): mixed
    {
        if ($depth > self::MAX_DECODE_DEPTH) {
            throw new LengthException('Payload is nested too deeply to decode.');
        }

        if (is_string($value) && preg_match('/^(?:[aOsidb]:|N;)/', $value)) {
            // allowed_classes=false: no class is instantiated, so no __wakeup/__destruct runs on payload data.
            $decoded = @unserialize($value, ['allowed_classes' => false]);

            if ($decoded === false && $value !== 'b:0;') {
                return $value;
            }

            try {
                return self::decodePayload($decoded, $depth + 1);
            } catch (LengthException) {
                // Circular references (r:/R:) never bottom out: show the raw serialized string instead.
                return $value;
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

        return is_array($value)
            ? array_map(fn (mixed $item): mixed => self::decodePayload($item, $depth + 1), $value)
            : $value;
    }
}
