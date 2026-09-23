<?php

return [
    'navigation' => [
        'group' => 'Növbə idarəetməsi',
    ],
    'resource' => [
        'job' => [
            'label' => 'Tapşırıq',
            'plural_label' => 'Tapşırıqlar',
        ],
        'failed_job' => [
            'label' => 'Uğursuz tapşırıq',
            'plural_label' => 'Uğursuz tapşırıqlar',
        ],
        'job_batch' => [
            'label' => 'Tapşırıq paketi',
            'plural_label' => 'Tapşırıq paketləri',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Növbə',
        'connection' => 'Bağlantı',
        'name' => 'Ad',
        'attempts' => 'Cəhdlər',
        'delay' => 'Gecikmə',
        'available_at' => 'Əlçatan olma vaxtı',
        'reserved_at' => 'Rezerv vaxtı',
        'created_at' => 'Yaradılma tarixi',
        'failed_at' => 'Uğursuzluq vaxtı',
        'finished_at' => 'Bitmə vaxtı',
        'cancelled_at' => 'Ləğv vaxtı',
        'payload' => 'Məlumat',
        'exception' => 'İstisna',
        'total_jobs' => 'Ümumi tapşırıqlar',
        'pending_jobs' => 'Gözləyən tapşırıqlar',
        'failed_jobs' => 'Uğursuz tapşırıqlar',
        'failed_job_ids' => 'Uğursuz tapşırıq ID-ləri',
        'options' => 'Seçimlər',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Sil',
            'success' => 'Tapşırıq silindi.',
        ],
        'retry' => [
            'label' => 'Təkrar cəhd et',
            'success' => 'Uğursuz tapşırıq yenidən növbəyə göndərildi.',
        ],
        'forget' => [
            'label' => 'Unut',
            'success' => 'Uğursuz tapşırıq silindi.',
        ],
        'retry_all' => [
            'label' => 'Hamısını təkrarla',
            'success' => 'Bütün uğursuz tapşırıqlar yenidən növbəyə göndərildi.',
        ],
        'flush' => [
            'label' => 'Hamısını təmizlə',
            'success' => 'Bütün uğursuz tapşırıqlar silindi.',
        ],
    ],
];
