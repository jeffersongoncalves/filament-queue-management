<?php

return [
    'navigation' => [
        'group' => 'Warteschlangenverwaltung',
    ],
    'resource' => [
        'job' => [
            'label' => 'Job',
            'plural_label' => 'Jobs',
        ],
        'failed_job' => [
            'label' => 'Fehlgeschlagener Job',
            'plural_label' => 'Fehlgeschlagene Jobs',
        ],
        'job_batch' => [
            'label' => 'Job-Batch',
            'plural_label' => 'Job-Batches',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Warteschlange',
        'connection' => 'Verbindung',
        'name' => 'Name',
        'attempts' => 'Versuche',
        'delay' => 'Verzögerung',
        'available_at' => 'Verfügbar ab',
        'reserved_at' => 'Reserviert am',
        'created_at' => 'Erstellt am',
        'failed_at' => 'Fehlgeschlagen am',
        'finished_at' => 'Beendet am',
        'cancelled_at' => 'Abgebrochen am',
        'payload' => 'Payload',
        'exception' => 'Ausnahme',
        'total_jobs' => 'Jobs gesamt',
        'pending_jobs' => 'Ausstehende Jobs',
        'failed_jobs' => 'Fehlgeschlagene Jobs',
        'failed_job_ids' => 'IDs fehlgeschlagener Jobs',
        'options' => 'Optionen',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Löschen',
            'success' => 'Der Job wurde gelöscht.',
        ],
        'retry' => [
            'label' => 'Wiederholen',
            'success' => 'Der fehlgeschlagene Job wurde wieder in die Warteschlange gestellt.',
        ],
        'forget' => [
            'label' => 'Vergessen',
            'success' => 'Der fehlgeschlagene Job wurde gelöscht.',
        ],
        'retry_all' => [
            'label' => 'Alle wiederholen',
            'success' => 'Alle fehlgeschlagenen Jobs wurden wieder in die Warteschlange gestellt.',
        ],
        'flush' => [
            'label' => 'Alle leeren',
            'success' => 'Alle fehlgeschlagenen Jobs wurden gelöscht.',
        ],
    ],
];
