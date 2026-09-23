<?php

return [
    'navigation' => [
        'group' => 'Gestión de colas',
    ],
    'resource' => [
        'job' => [
            'label' => 'Trabajo',
            'plural_label' => 'Trabajos',
        ],
        'failed_job' => [
            'label' => 'Trabajo fallido',
            'plural_label' => 'Trabajos fallidos',
        ],
        'job_batch' => [
            'label' => 'Lote de trabajos',
            'plural_label' => 'Lotes de trabajos',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Cola',
        'connection' => 'Conexión',
        'name' => 'Nombre',
        'attempts' => 'Intentos',
        'delay' => 'Retraso',
        'available_at' => 'Disponible el',
        'reserved_at' => 'Reservado el',
        'created_at' => 'Creado el',
        'failed_at' => 'Falló el',
        'finished_at' => 'Finalizado el',
        'cancelled_at' => 'Cancelado el',
        'payload' => 'Payload',
        'exception' => 'Excepción',
        'total_jobs' => 'Total de trabajos',
        'pending_jobs' => 'Trabajos pendientes',
        'failed_jobs' => 'Trabajos fallidos',
        'failed_job_ids' => 'IDs de trabajos fallidos',
        'options' => 'Opciones',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Eliminar',
            'success' => 'El trabajo ha sido eliminado.',
        ],
        'retry' => [
            'label' => 'Reintentar',
            'success' => 'El trabajo fallido se ha devuelto a la cola.',
        ],
        'forget' => [
            'label' => 'Olvidar',
            'success' => 'El trabajo fallido ha sido eliminado.',
        ],
        'retry_all' => [
            'label' => 'Reintentar todos',
            'success' => 'Todos los trabajos fallidos se han devuelto a la cola.',
        ],
        'flush' => [
            'label' => 'Vaciar todos',
            'success' => 'Todos los trabajos fallidos han sido eliminados.',
        ],
    ],
];
