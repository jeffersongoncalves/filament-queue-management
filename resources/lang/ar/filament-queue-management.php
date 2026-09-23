<?php

return [
    'navigation' => [
        'group' => 'إدارة الطوابير',
    ],
    'resource' => [
        'job' => [
            'label' => 'مهمة',
            'plural_label' => 'المهام',
        ],
        'failed_job' => [
            'label' => 'مهمة فاشلة',
            'plural_label' => 'المهام الفاشلة',
        ],
        'job_batch' => [
            'label' => 'دفعة مهام',
            'plural_label' => 'دفعات المهام',
        ],
    ],
    'column' => [
        'id' => 'المعرّف',
        'uuid' => 'UUID',
        'queue' => 'الطابور',
        'connection' => 'الاتصال',
        'name' => 'الاسم',
        'attempts' => 'المحاولات',
        'delay' => 'التأخير',
        'available_at' => 'متاحة في',
        'reserved_at' => 'محجوزة في',
        'created_at' => 'تاريخ الإنشاء',
        'failed_at' => 'فشلت في',
        'finished_at' => 'انتهت في',
        'cancelled_at' => 'أُلغيت في',
        'payload' => 'الحمولة',
        'exception' => 'الاستثناء',
        'total_jobs' => 'إجمالي المهام',
        'pending_jobs' => 'المهام المعلقة',
        'failed_jobs' => 'المهام الفاشلة',
        'failed_job_ids' => 'معرّفات المهام الفاشلة',
        'options' => 'الخيارات',
    ],
    'actions' => [
        'delete' => [
            'label' => 'حذف',
            'success' => 'تم حذف المهمة.',
        ],
        'retry' => [
            'label' => 'إعادة المحاولة',
            'success' => 'تمت إعادة المهمة الفاشلة إلى الطابور.',
        ],
        'forget' => [
            'label' => 'نسيان',
            'success' => 'تم حذف المهمة الفاشلة.',
        ],
        'retry_all' => [
            'label' => 'إعادة محاولة الكل',
            'success' => 'تمت إعادة جميع المهام الفاشلة إلى الطابور.',
        ],
        'flush' => [
            'label' => 'مسح الكل',
            'success' => 'تم حذف جميع المهام الفاشلة.',
        ],
    ],
];
