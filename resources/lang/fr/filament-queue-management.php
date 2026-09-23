<?php

return [
    'navigation' => [
        'group' => 'Gestion des files d\'attente',
    ],
    'resource' => [
        'job' => [
            'label' => 'Tâche',
            'plural_label' => 'Tâches',
        ],
        'failed_job' => [
            'label' => 'Tâche échouée',
            'plural_label' => 'Tâches échouées',
        ],
        'job_batch' => [
            'label' => 'Lot de tâches',
            'plural_label' => 'Lots de tâches',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'File',
        'connection' => 'Connexion',
        'name' => 'Nom',
        'attempts' => 'Tentatives',
        'delay' => 'Délai',
        'available_at' => 'Disponible le',
        'reserved_at' => 'Réservée le',
        'created_at' => 'Créée le',
        'failed_at' => 'Échouée le',
        'finished_at' => 'Terminée le',
        'cancelled_at' => 'Annulée le',
        'payload' => 'Payload',
        'exception' => 'Exception',
        'total_jobs' => 'Total des tâches',
        'pending_jobs' => 'Tâches en attente',
        'failed_jobs' => 'Tâches échouées',
        'failed_job_ids' => 'ID des tâches échouées',
        'options' => 'Options',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Supprimer',
            'success' => 'La tâche a été supprimée.',
        ],
        'retry' => [
            'label' => 'Réessayer',
            'success' => 'La tâche échouée a été remise dans la file.',
        ],
        'forget' => [
            'label' => 'Oublier',
            'success' => 'La tâche échouée a été supprimée.',
        ],
        'retry_all' => [
            'label' => 'Tout réessayer',
            'success' => 'Toutes les tâches échouées ont été remises dans la file.',
        ],
        'flush' => [
            'label' => 'Tout vider',
            'success' => 'Toutes les tâches échouées ont été supprimées.',
        ],
    ],
];
