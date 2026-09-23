<?php

return [
    'navigation' => [
        'group' => 'Управление очередями',
    ],
    'resource' => [
        'job' => [
            'label' => 'Задача',
            'plural_label' => 'Задачи',
        ],
        'failed_job' => [
            'label' => 'Неудачная задача',
            'plural_label' => 'Неудачные задачи',
        ],
        'job_batch' => [
            'label' => 'Пакет задач',
            'plural_label' => 'Пакеты задач',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Очередь',
        'connection' => 'Подключение',
        'name' => 'Название',
        'attempts' => 'Попытки',
        'delay' => 'Задержка',
        'available_at' => 'Доступна с',
        'reserved_at' => 'Зарезервирована',
        'created_at' => 'Создана',
        'failed_at' => 'Сбой',
        'finished_at' => 'Завершена',
        'cancelled_at' => 'Отменена',
        'payload' => 'Данные',
        'exception' => 'Исключение',
        'total_jobs' => 'Всего задач',
        'pending_jobs' => 'Ожидающие задачи',
        'failed_jobs' => 'Неудачные задачи',
        'failed_job_ids' => 'ID неудачных задач',
        'options' => 'Параметры',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Удалить',
            'success' => 'Задача удалена.',
        ],
        'retry' => [
            'label' => 'Повторить',
            'success' => 'Неудачная задача возвращена в очередь.',
        ],
        'forget' => [
            'label' => 'Забыть',
            'success' => 'Неудачная задача удалена.',
        ],
        'retry_all' => [
            'label' => 'Повторить все',
            'success' => 'Все неудачные задачи возвращены в очередь.',
        ],
        'flush' => [
            'label' => 'Очистить все',
            'success' => 'Все неудачные задачи удалены.',
        ],
    ],
];
