<?php

return [
    'navigation' => [
        'group' => 'Gestão de filas',
    ],
    'resource' => [
        'job' => [
            'label' => 'Tarefa',
            'plural_label' => 'Tarefas',
        ],
        'failed_job' => [
            'label' => 'Tarefa falhada',
            'plural_label' => 'Tarefas falhadas',
        ],
        'job_batch' => [
            'label' => 'Lote de tarefas',
            'plural_label' => 'Lotes de tarefas',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Fila',
        'connection' => 'Ligação',
        'name' => 'Nome',
        'attempts' => 'Tentativas',
        'delay' => 'Atraso',
        'available_at' => 'Disponível em',
        'reserved_at' => 'Reservada em',
        'created_at' => 'Criada em',
        'failed_at' => 'Falhou em',
        'finished_at' => 'Terminada em',
        'cancelled_at' => 'Cancelada em',
        'payload' => 'Payload',
        'exception' => 'Exceção',
        'total_jobs' => 'Total de tarefas',
        'pending_jobs' => 'Tarefas pendentes',
        'failed_jobs' => 'Tarefas falhadas',
        'failed_job_ids' => 'IDs das tarefas falhadas',
        'options' => 'Opções',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Eliminar',
            'success' => 'A tarefa foi eliminada.',
        ],
        'retry' => [
            'label' => 'Tentar novamente',
            'success' => 'A tarefa falhada foi devolvida à fila.',
        ],
        'forget' => [
            'label' => 'Esquecer',
            'success' => 'A tarefa falhada foi eliminada.',
        ],
        'retry_all' => [
            'label' => 'Tentar todas novamente',
            'success' => 'Todas as tarefas falhadas foram devolvidas à fila.',
        ],
        'flush' => [
            'label' => 'Limpar todas',
            'success' => 'Todas as tarefas falhadas foram eliminadas.',
        ],
    ],
];
