# Changelog

All notable changes to `filament-queue-management` will be documented in this file.

## 3.0.0 - 2026-06-24

Filament v5 support. Resources for jobs, failed_jobs and job_batches with retry, forget, flush and delete actions.

## Unreleased

### Added

- Initial release for Filament v5.
- `JobResource` to monitor and prune pending jobs in the `jobs` table.
- `FailedJobResource` to monitor, retry and forget failed jobs in the `failed_jobs` table, with retry-all and flush-all header actions.
- `JobBatchResource` to monitor job batches in the `job_batches` table (read-only).
- Queue resources grouped under a configurable "Queue Management" navigation group with fluent customisation of the group label, sort, per-resource slugs and icons.
- Built on top of `jeffersongoncalves/laravel-queue-management` (models and `QueueManager` service) and `jeffersongoncalves/filament-plugin-core`.
