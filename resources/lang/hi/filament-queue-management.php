<?php

return [
    'navigation' => [
        'group' => 'क्यू प्रबंधन',
    ],
    'resource' => [
        'job' => [
            'label' => 'जॉब',
            'plural_label' => 'जॉब्स',
        ],
        'failed_job' => [
            'label' => 'विफल जॉब',
            'plural_label' => 'विफल जॉब्स',
        ],
        'job_batch' => [
            'label' => 'जॉब बैच',
            'plural_label' => 'जॉब बैच',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'क्यू',
        'connection' => 'कनेक्शन',
        'name' => 'नाम',
        'attempts' => 'प्रयास',
        'delay' => 'विलंब',
        'available_at' => 'उपलब्ध समय',
        'reserved_at' => 'आरक्षित समय',
        'created_at' => 'बनाया गया',
        'failed_at' => 'विफल समय',
        'finished_at' => 'समाप्त समय',
        'cancelled_at' => 'रद्द समय',
        'payload' => 'पेलोड',
        'exception' => 'अपवाद',
        'total_jobs' => 'कुल जॉब्स',
        'pending_jobs' => 'लंबित जॉब्स',
        'failed_jobs' => 'विफल जॉब्स',
        'failed_job_ids' => 'विफल जॉब IDs',
        'options' => 'विकल्प',
    ],
    'actions' => [
        'delete' => [
            'label' => 'हटाएँ',
            'success' => 'जॉब हटा दिया गया है।',
        ],
        'retry' => [
            'label' => 'पुनः प्रयास करें',
            'success' => 'विफल जॉब को फिर से क्यू में डाल दिया गया है।',
        ],
        'forget' => [
            'label' => 'भूल जाएँ',
            'success' => 'विफल जॉब हटा दिया गया है।',
        ],
        'retry_all' => [
            'label' => 'सभी पुनः प्रयास करें',
            'success' => 'सभी विफल जॉब्स को फिर से क्यू में डाल दिया गया है।',
        ],
        'flush' => [
            'label' => 'सभी साफ़ करें',
            'success' => 'सभी विफल जॉब्स हटा दिए गए हैं।',
        ],
    ],
];
