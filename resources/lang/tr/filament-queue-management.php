<?php

return [
    'navigation' => [
        'group' => 'Kuyruk yönetimi',
    ],
    'resource' => [
        'job' => [
            'label' => 'İş',
            'plural_label' => 'İşler',
        ],
        'failed_job' => [
            'label' => 'Başarısız iş',
            'plural_label' => 'Başarısız işler',
        ],
        'job_batch' => [
            'label' => 'İş grubu',
            'plural_label' => 'İş grupları',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'Kuyruk',
        'connection' => 'Bağlantı',
        'name' => 'Ad',
        'attempts' => 'Denemeler',
        'delay' => 'Gecikme',
        'available_at' => 'Kullanılabilir tarih',
        'reserved_at' => 'Ayrılma tarihi',
        'created_at' => 'Oluşturulma tarihi',
        'failed_at' => 'Başarısız olma tarihi',
        'finished_at' => 'Bitiş tarihi',
        'cancelled_at' => 'İptal tarihi',
        'payload' => 'Yük',
        'exception' => 'İstisna',
        'total_jobs' => 'Toplam iş',
        'pending_jobs' => 'Bekleyen işler',
        'failed_jobs' => 'Başarısız işler',
        'failed_job_ids' => 'Başarısız iş kimlikleri',
        'options' => 'Seçenekler',
    ],
    'actions' => [
        'delete' => [
            'label' => 'Sil',
            'success' => 'İş silindi.',
        ],
        'retry' => [
            'label' => 'Tekrar dene',
            'success' => 'Başarısız iş kuyruğa geri gönderildi.',
        ],
        'forget' => [
            'label' => 'Unut',
            'success' => 'Başarısız iş silindi.',
        ],
        'retry_all' => [
            'label' => 'Tümünü tekrar dene',
            'success' => 'Tüm başarısız işler kuyruğa geri gönderildi.',
        ],
        'flush' => [
            'label' => 'Tümünü temizle',
            'success' => 'Tüm başarısız işler silindi.',
        ],
    ],
];
