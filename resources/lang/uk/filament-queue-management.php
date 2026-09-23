<?php

return [
    'navigation' => [
        'group' => 'Керування чергами',
    ],
    'resource' => [
        'job' => [
            'label' => 'Завдання',
            'plural_label' => 'Завдання',
        ],
        'failed_job' => [
            'label' => 'Невдале завдання',
            'plural_label' => 'Невдалі завдання',
        ],
        'job_batch' => [
            'label' => 'Пакет завдань',
            'plural_label' => 'Пакети завдань',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Черга',
        'connection' => 'Підключення',
        'name' => 'Назва',
        'attempts' => 'Спроби',
        'delay' => 'Затримка',
        'available_at' => 'Доступне з',
        'reserved_at' => 'Зарезервовано',
        'created_at' => 'Створено',
        'failed_at' => 'Збій',
        'finished_at' => 'Завершено',
        'cancelled_at' => 'Скасовано',
        'payload' => 'Дані',
        'exception' => 'Виняток',
        'total_jobs' => 'Усього завдань',
        'pending_jobs' => 'Завдання в очікуванні',
        'failed_jobs' => 'Невдалі завдання',
        'failed_job_ids' => 'ID невдалих завдань',
        'options' => 'Параметри',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Видалити',
            'success' => 'Завдання видалено.',
        ],
        'retry' => [
            'label' => 'Повторити',
            'success' => 'Невдале завдання повернуто в чергу.',
        ],
        'forget' => [
            'label' => 'Забути',
            'success' => 'Невдале завдання видалено.',
        ],
        'retry_all' => [
            'label' => 'Повторити всі',
            'success' => 'Усі невдалі завдання повернуто в чергу.',
        ],
        'flush' => [
            'label' => 'Очистити всі',
            'success' => 'Усі невдалі завдання видалено.',
        ],
    ],
];
