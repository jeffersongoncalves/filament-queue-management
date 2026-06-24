<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    'navigation' => [
        'group' => 'Gerenciamento de Fila',
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
            'label' => 'Job com Falha',
            'plural_label' => 'Jobs com Falha',
        ],
        'job_batch' => [
            'label' => 'Lote de Jobs',
            'plural_label' => 'Lotes de Jobs',
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
        'queue' => 'Fila',
        'connection' => 'Conexão',
        'name' => 'Nome',
        'attempts' => 'Tentativas',
        'delay' => 'Atraso',
        'available_at' => 'Disponível Em',
        'reserved_at' => 'Reservado Em',
        'created_at' => 'Criado Em',
        'failed_at' => 'Falhou Em',
        'finished_at' => 'Finalizado Em',
        'cancelled_at' => 'Cancelado Em',
        'payload' => 'Payload',
        'exception' => 'Exceção',
        'total_jobs' => 'Total de Jobs',
        'pending_jobs' => 'Jobs Pendentes',
        'failed_jobs' => 'Jobs com Falha',
        'failed_job_ids' => 'IDs dos Jobs com Falha',
        'options' => 'Opções',
    ],

    /*
    |--------------------------------------------------------------------------
    | Actions
    |--------------------------------------------------------------------------
    */

    'actions' => [
        'delete' => [
            'label' => 'Excluir',
            'success' => 'O job foi excluído.',
        ],
        'retry' => [
            'label' => 'Tentar novamente',
            'success' => 'O job com falha foi reenviado para a fila.',
        ],
        'forget' => [
            'label' => 'Esquecer',
            'success' => 'O job com falha foi excluído.',
        ],
        'retry_all' => [
            'label' => 'Tentar todos',
            'success' => 'Todos os jobs com falha foram reenviados para a fila.',
        ],
        'flush' => [
            'label' => 'Limpar todos',
            'success' => 'Todos os jobs com falha foram excluídos.',
        ],
    ],
];
