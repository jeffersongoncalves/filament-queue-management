<?php

return [
    'navigation' => [
        'group' => 'Gestione code',
    ],
    'resource' => [
        'job' => [
            'label' => 'Job',
            'plural_label' => 'Job',
        ],
        'failed_job' => [
            'label' => 'Job non riuscito',
            'plural_label' => 'Job non riusciti',
        ],
        'job_batch' => [
            'label' => 'Batch di job',
            'plural_label' => 'Batch di job',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Coda',
        'connection' => 'Connessione',
        'name' => 'Nome',
        'attempts' => 'Tentativi',
        'delay' => 'Ritardo',
        'available_at' => 'Disponibile il',
        'reserved_at' => 'Riservato il',
        'created_at' => 'Creato il',
        'failed_at' => 'Fallito il',
        'finished_at' => 'Completato il',
        'cancelled_at' => 'Annullato il',
        'payload' => 'Payload',
        'exception' => 'Eccezione',
        'total_jobs' => 'Job totali',
        'pending_jobs' => 'Job in attesa',
        'failed_jobs' => 'Job non riusciti',
        'failed_job_ids' => 'ID dei job non riusciti',
        'options' => 'Opzioni',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Il job è stato eliminato.',
        ],
        'retry' => [
            'label' => 'Riprova',
            'success' => 'Il job non riuscito è stato rimesso in coda.',
        ],
        'forget' => [
            'label' => 'Dimentica',
            'success' => 'Il job non riuscito è stato eliminato.',
        ],
        'retry_all' => [
            'label' => 'Riprova tutti',
            'success' => 'Tutti i job non riusciti sono stati rimessi in coda.',
        ],
        'flush' => [
            'label' => 'Svuota tutti',
            'success' => 'Tutti i job non riusciti sono stati eliminati.',
        ],
    ],
];
