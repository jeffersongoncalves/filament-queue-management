<?php

return [
    'navigation' => [
        'group' => '队列管理',
    ],
    'resource' => [
        'job' => [
            'label' => '任务',
            'plural_label' => '任务',
        ],
        'failed_job' => [
            'label' => '失败任务',
            'plural_label' => '失败任务',
        ],
        'job_batch' => [
            'label' => '任务批次',
            'plural_label' => '任务批次',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => '队列',
        'connection' => '连接',
        'name' => '名称',
        'attempts' => '尝试次数',
        'delay' => '延迟',
        'available_at' => '可用时间',
        'reserved_at' => '保留时间',
        'created_at' => '创建时间',
        'failed_at' => '失败时间',
        'finished_at' => '完成时间',
        'cancelled_at' => '取消时间',
        'payload' => '负载',
        'exception' => '异常',
        'total_jobs' => '任务总数',
        'pending_jobs' => '待处理任务',
        'failed_jobs' => '失败任务',
        'failed_job_ids' => '失败任务 ID',
        'options' => '选项',
    ],
    'actions' => [
        'delete' => [
            'label' => '删除',
            'success' => '任务已删除。',
        ],
        'retry' => [
            'label' => '重试',
            'success' => '失败任务已重新推送到队列。',
        ],
        'forget' => [
            'label' => '忽略',
            'success' => '失败任务已删除。',
        ],
        'retry_all' => [
            'label' => '全部重试',
            'success' => '所有失败任务已重新推送到队列。',
        ],
        'flush' => [
            'label' => '全部清空',
            'success' => '所有失败任务已删除。',
        ],
    ],
];
