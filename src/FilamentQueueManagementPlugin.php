<?php

namespace JeffersonGoncalves\Filament\QueueManagement;

use Filament\Panel;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\FailedJobResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\JobBatchResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\JobResource;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;

class FilamentQueueManagementPlugin extends BasePlugin
{
    protected ?string $navigationGroup = null;

    protected ?int $navigationSort = null;

    protected ?string $jobsSlug = null;

    protected ?string $failedJobsSlug = null;

    protected ?string $jobBatchesSlug = null;

    protected ?string $jobsNavigationIcon = null;

    protected ?string $failedJobsNavigationIcon = null;

    protected ?string $jobBatchesNavigationIcon = null;

    public function getId(): string
    {
        return 'filament-queue-management';
    }

    public function register(Panel $panel): void
    {
        $this->applyConfiguration();

        $panel->resources([
            JobResource::class,
            FailedJobResource::class,
            JobBatchResource::class,
        ]);
    }

    public function navigationGroup(?string $label): static
    {
        $this->navigationGroup = $label;

        return $this;
    }

    public function navigationSort(?int $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function jobsSlug(string $slug): static
    {
        $this->jobsSlug = $slug;

        return $this;
    }

    public function failedJobsSlug(string $slug): static
    {
        $this->failedJobsSlug = $slug;

        return $this;
    }

    public function jobBatchesSlug(string $slug): static
    {
        $this->jobBatchesSlug = $slug;

        return $this;
    }

    public function jobsNavigationIcon(string $icon): static
    {
        $this->jobsNavigationIcon = $icon;

        return $this;
    }

    public function failedJobsNavigationIcon(string $icon): static
    {
        $this->failedJobsNavigationIcon = $icon;

        return $this;
    }

    public function jobBatchesNavigationIcon(string $icon): static
    {
        $this->jobBatchesNavigationIcon = $icon;

        return $this;
    }

    /**
     * Push the fluent overrides into the shared config so that both the
     * plugin registration path and the standard service-provider resource
     * discovery path read configuration from a single source.
     */
    protected function applyConfiguration(): void
    {
        if ($this->navigationGroup !== null) {
            config()->set('filament-queue-management.navigation.group', $this->navigationGroup);
        }

        if ($this->navigationSort !== null) {
            config()->set('filament-queue-management.navigation.sort', $this->navigationSort);
        }

        if ($this->jobsSlug !== null) {
            config()->set('filament-queue-management.resources.jobs.slug', $this->jobsSlug);
        }

        if ($this->failedJobsSlug !== null) {
            config()->set('filament-queue-management.resources.failed_jobs.slug', $this->failedJobsSlug);
        }

        if ($this->jobBatchesSlug !== null) {
            config()->set('filament-queue-management.resources.job_batches.slug', $this->jobBatchesSlug);
        }

        if ($this->jobsNavigationIcon !== null) {
            config()->set('filament-queue-management.resources.jobs.navigation_icon', $this->jobsNavigationIcon);
        }

        if ($this->failedJobsNavigationIcon !== null) {
            config()->set('filament-queue-management.resources.failed_jobs.navigation_icon', $this->failedJobsNavigationIcon);
        }

        if ($this->jobBatchesNavigationIcon !== null) {
            config()->set('filament-queue-management.resources.job_batches.navigation_icon', $this->jobBatchesNavigationIcon);
        }
    }
}
