<?php

return [
    'navigation' => [
        'group' => 'Navbatlarni boshqarish',
    ],
    'resource' => [
        'job' => [
            'label' => 'Vazifa',
            'plural_label' => 'Vazifalar',
        ],
        'failed_job' => [
            'label' => 'Muvaffaqiyatsiz vazifa',
            'plural_label' => 'Muvaffaqiyatsiz vazifalar',
        ],
        'job_batch' => [
            'label' => 'Vazifalar paketi',
            'plural_label' => 'Vazifalar paketlari',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Navbat',
        'connection' => 'Ulanish',
        'name' => 'Nomi',
        'attempts' => 'Urinishlar',
        'delay' => 'Kechikish',
        'available_at' => 'Mavjud boʻlish vaqti',
        'reserved_at' => 'Band qilingan vaqt',
        'created_at' => 'Yaratilgan',
        'failed_at' => 'Muvaffaqiyatsiz boʻlgan vaqt',
        'finished_at' => 'Tugagan vaqt',
        'cancelled_at' => 'Bekor qilingan vaqt',
        'payload' => 'Maʼlumot',
        'exception' => 'Istisno',
        'total_jobs' => 'Jami vazifalar',
        'pending_jobs' => 'Kutilayotgan vazifalar',
        'failed_jobs' => 'Muvaffaqiyatsiz vazifalar',
        'failed_job_ids' => 'Muvaffaqiyatsiz vazifalar ID raqamlari',
        'options' => 'Parametrlar',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Oʻchirish',
            'success' => 'Vazifa oʻchirildi.',
        ],
        'retry' => [
            'label' => 'Qayta urinish',
            'success' => 'Muvaffaqiyatsiz vazifa navbatga qaytarildi.',
        ],
        'forget' => [
            'label' => 'Unutish',
            'success' => 'Muvaffaqiyatsiz vazifa oʻchirildi.',
        ],
        'retry_all' => [
            'label' => 'Barchasini qayta urinish',
            'success' => 'Barcha muvaffaqiyatsiz vazifalar navbatga qaytarildi.',
        ],
        'flush' => [
            'label' => 'Barchasini tozalash',
            'success' => 'Barcha muvaffaqiyatsiz vazifalar oʻchirildi.',
        ],
    ],
];
