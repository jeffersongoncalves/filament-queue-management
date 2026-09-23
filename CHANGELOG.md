# Changelog

All notable changes to `filament-queue-management` will be documented in this file.

## 3.1.0 - 2026-09-23

### What's new

- **Translations:** 17 new locales (ar, az, de, es, fa, fr, hi, it, ja, nl, pl, pt, ru, tr, uk, uz, zh_CN). (#17)

Thanks to @Elvin-Qulizade (Elvin Qulizada) for the i18n initiative behind these translations — first contributed in jeffersongoncalves/filament-scanner-guard#2 and now rolled out across the Filament plugins. He is credited as co-author.

### What's Changed

* docs: add Buy Me a Coffee sponsor link by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/1
* chore: add GitHub Sponsors to FUNDING.yml by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/4
* ci: standardize update-changelog workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/10
* ci: standardize dependabot config by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/11
* ci: standardize tests workflow (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/14
* feat(i18n): add translations (3.x) by @jeffersongoncalves in https://github.com/jeffersongoncalves/filament-queue-management/pull/17

**Full Changelog**: https://github.com/jeffersongoncalves/filament-queue-management/compare/3.0.0...3.1.0

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
