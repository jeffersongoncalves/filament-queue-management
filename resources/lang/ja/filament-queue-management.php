<?php

return [
    'navigation' => [
        'group' => 'キュー管理',
    ],
    'resource' => [
        'job' => [
            'label' => 'ジョブ',
            'plural_label' => 'ジョブ',
        ],
        'failed_job' => [
            'label' => '失敗したジョブ',
            'plural_label' => '失敗したジョブ',
        ],
        'job_batch' => [
            'label' => 'ジョブバッチ',
            'plural_label' => 'ジョブバッチ',
        ],
    ],
    'column' => [
        'id' => 'ID',
        'uuid' => 'UUID',
        'queue' => 'キュー',
        'connection' => '接続',
        'name' => '名前',
        'attempts' => '試行回数',
        'delay' => '遅延',
        'available_at' => '利用可能日時',
        'reserved_at' => '予約日時',
        'created_at' => '作成日時',
        'failed_at' => '失敗日時',
        'finished_at' => '完了日時',
        'cancelled_at' => 'キャンセル日時',
        'payload' => 'ペイロード',
        'exception' => '例外',
        'total_jobs' => 'ジョブ総数',
        'pending_jobs' => '保留中のジョブ',
        'failed_jobs' => '失敗したジョブ',
        'failed_job_ids' => '失敗したジョブの ID',
        'options' => 'オプション',
    ],
    'actions' => [
        'delete' => [
            'label' => '削除',
            'success' => 'ジョブを削除しました。',
        ],
        'retry' => [
            'label' => '再試行',
            'success' => '失敗したジョブをキューに戻しました。',
        ],
        'forget' => [
            'label' => '破棄',
            'success' => '失敗したジョブを削除しました。',
        ],
        'retry_all' => [
            'label' => 'すべて再試行',
            'success' => '失敗したすべてのジョブをキューに戻しました。',
        ],
        'flush' => [
            'label' => 'すべて消去',
            'success' => '失敗したすべてのジョブを削除しました。',
        ],
    ],
];
