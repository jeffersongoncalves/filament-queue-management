<?php

return [
    'navigation' => [
        'group' => 'Wachtrijbeheer',
    ],
    'resource' => [
        'job' => [
            'label' => 'Job',
            'plural_label' => 'Jobs',
        ],
        'failed_job' => [
            'label' => 'Mislukte job',
            'plural_label' => 'Mislukte jobs',
        ],
        'job_batch' => [
            'label' => 'Jobbatch',
            'plural_label' => 'Jobbatches',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Wachtrij',
        'connection' => 'Verbinding',
        'name' => 'Naam',
        'attempts' => 'Pogingen',
        'delay' => 'Vertraging',
        'available_at' => 'Beschikbaar op',
        'reserved_at' => 'Gereserveerd op',
        'created_at' => 'Aangemaakt op',
        'failed_at' => 'Mislukt op',
        'finished_at' => 'Voltooid op',
        'cancelled_at' => 'Geannuleerd op',
        'payload' => 'Payload',
        'exception' => 'Uitzondering',
        'total_jobs' => 'Totaal jobs',
        'pending_jobs' => 'Openstaande jobs',
        'failed_jobs' => 'Mislukte jobs',
        'failed_job_ids' => 'ID\'s van mislukte jobs',
        'options' => 'Opties',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Verwijderen',
            'success' => 'De job is verwijderd.',
        ],
        'retry' => [
            'label' => 'Opnieuw proberen',
            'success' => 'De mislukte job is terug in de wachtrij geplaatst.',
        ],
        'forget' => [
            'label' => 'Vergeten',
            'success' => 'De mislukte job is verwijderd.',
        ],
        'retry_all' => [
            'label' => 'Alles opnieuw proberen',
            'success' => 'Alle mislukte jobs zijn terug in de wachtrij geplaatst.',
        ],
        'flush' => [
            'label' => 'Alles legen',
            'success' => 'Alle mislukte jobs zijn verwijderd.',
        ],
    ],
];
