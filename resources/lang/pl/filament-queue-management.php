<?php

return [
    'navigation' => [
        'group' => 'Zarządzanie kolejkami',
    ],
    'resource' => [
        'job' => [
            'label' => 'Zadanie',
            'plural_label' => 'Zadania',
        ],
        'failed_job' => [
            'label' => 'Nieudane zadanie',
            'plural_label' => 'Nieudane zadania',
        ],
        'job_batch' => [
            'label' => 'Partia zadań',
            'plural_label' => 'Partie zadań',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Kolejka',
        'connection' => 'Połączenie',
        'name' => 'Nazwa',
        'attempts' => 'Próby',
        'delay' => 'Opóźnienie',
        'available_at' => 'Dostępne od',
        'reserved_at' => 'Zarezerwowano',
        'created_at' => 'Utworzono',
        'failed_at' => 'Niepowodzenie',
        'finished_at' => 'Zakończono',
        'cancelled_at' => 'Anulowano',
        'payload' => 'Payload',
        'exception' => 'Wyjątek',
        'total_jobs' => 'Łącznie zadań',
        'pending_jobs' => 'Oczekujące zadania',
        'failed_jobs' => 'Nieudane zadania',
        'failed_job_ids' => 'ID nieudanych zadań',
        'options' => 'Opcje',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Usuń',
            'success' => 'Zadanie zostało usunięte.',
        ],
        'retry' => [
            'label' => 'Ponów',
            'success' => 'Nieudane zadanie zostało ponownie dodane do kolejki.',
        ],
        'forget' => [
            'label' => 'Zapomnij',
            'success' => 'Nieudane zadanie zostało usunięte.',
        ],
        'retry_all' => [
            'label' => 'Ponów wszystkie',
            'success' => 'Wszystkie nieudane zadania zostały ponownie dodane do kolejki.',
        ],
        'flush' => [
            'label' => 'Wyczyść wszystkie',
            'success' => 'Wszystkie nieudane zadania zostały usunięte.',
        ],
    ],
];
