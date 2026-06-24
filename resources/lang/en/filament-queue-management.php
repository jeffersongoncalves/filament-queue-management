<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Queue Management',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    */

    'resource' => [
        'job' => [
            'label' => 'Job',
            'plural_label' => 'Jobs',
        ],
        'failed_job' => [
            'label' => 'Failed Job',
            'plural_label' => 'Failed Jobs',
        ],
        'job_batch' => [
            'label' => 'Job Batch',
            'plural_label' => 'Job Batches',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Columns
    |--------------------------------------------------------------------------
    */

    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Queue',
        'connection' => 'Connection',
        'name' => 'Name',
        'attempts' => 'Attempts',
        'delay' => 'Delay',
        'available_at' => 'Available At',
        'reserved_at' => 'Reserved At',
        'created_at' => 'Created At',
        'failed_at' => 'Failed At',
        'finished_at' => 'Finished At',
        'cancelled_at' => 'Cancelled At',
        'payload' => 'Payload',
        'exception' => 'Exception',
        'total_jobs' => 'Total Jobs',
        'pending_jobs' => 'Pending Jobs',
        'failed_jobs' => 'Failed Jobs',
        'failed_job_ids' => 'Failed Job IDs',
        'options' => 'Options',
    ],

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    */

    'actions' => [
        'delete' => [
            'label' => 'Delete',
            'success' => 'The job has been deleted.',
        ],
        'retry' => [
            'label' => 'Retry',
            'success' => 'The failed job has been pushed back onto the queue.',
        ],
        'forget' => [
            'label' => 'Forget',
            'success' => 'The failed job has been deleted.',
        ],
        'retry_all' => [
            'label' => 'Retry all',
            'success' => 'All failed jobs have been pushed back onto the queue.',
        ],
        'flush' => [
            'label' => 'Flush all',
            'success' => 'All failed jobs have been deleted.',
        ],
    ],
];
