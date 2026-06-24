<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    |
    | The navigation group the three queue resources are registered under and
    | their sort order. Leave "group" null to use the translated default label
    | ("Queue Management"). These values can also be set fluently on the plugin.
    |
    */
    'navigation' => [
        'group' => null,
        'sort' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | Per-resource slug (used in the panel URL) and navigation icon. These can
    | also be customised fluently when registering the plugin.
    |
    */
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
