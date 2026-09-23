<?php

return [
    'navigation' => [
        'group' => 'مدیریت صف',
    ],
    'resource' => [
        'job' => [
            'label' => 'کار',
            'plural_label' => 'کارها',
        ],
        'failed_job' => [
            'label' => 'کار ناموفق',
            'plural_label' => 'کارهای ناموفق',
        ],
        'job_batch' => [
            'label' => 'دسته کار',
            'plural_label' => 'دسته‌های کار',
        ],
    ],
    'column' => [
        'id' => 'شناسه',
        'uuid' => 'UUID',
        'queue' => 'صف',
        'connection' => 'اتصال',
        'name' => 'نام',
        'attempts' => 'تلاش‌ها',
        'delay' => 'تأخیر',
        'available_at' => 'زمان در دسترس بودن',
        'reserved_at' => 'زمان رزرو',
        'created_at' => 'تاریخ ایجاد',
        'failed_at' => 'زمان شکست',
        'finished_at' => 'زمان پایان',
        'cancelled_at' => 'زمان لغو',
        'payload' => 'داده',
        'exception' => 'استثنا',
        'total_jobs' => 'کل کارها',
        'pending_jobs' => 'کارهای در انتظار',
        'failed_jobs' => 'کارهای ناموفق',
        'failed_job_ids' => 'شناسه‌های کارهای ناموفق',
        'options' => 'گزینه‌ها',
    ],
    'actions' => [
        'delete' => [
            'label' => 'حذف',
            'success' => 'کار حذف شد.',
        ],
        'retry' => [
            'label' => 'تلاش مجدد',
            'success' => 'کار ناموفق دوباره به صف فرستاده شد.',
        ],
        'forget' => [
            'label' => 'فراموش کردن',
            'success' => 'کار ناموفق حذف شد.',
        ],
        'retry_all' => [
            'label' => 'تلاش مجدد همه',
            'success' => 'همه کارهای ناموفق دوباره به صف فرستاده شدند.',
        ],
        'flush' => [
            'label' => 'پاک کردن همه',
            'success' => 'همه کارهای ناموفق حذف شدند.',
        ],
    ],
];
