<?php

use Illuminate\Support\Str;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\FailedJobResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\Pages\ListFailedJobs;
use JeffersonGoncalves\Filament\QueueManagement\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QueueManagement\Facades\QueueManagement;
use JeffersonGoncalves\QueueManagement\Models\FailedJob;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(TestUser::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@example.com',
    ]));
});

function makeFailedJob(string $connection = 'database', string $queue = 'default'): FailedJob
{
    return FailedJob::create([
        'uuid' => (string) Str::uuid(),
        'connection' => $connection,
        'queue' => $queue,
        'payload' => ['displayName' => 'App\\Jobs\\SendEmail', 'maxTries' => 3, 'delay' => 0],
        'exception' => 'RuntimeException: Something went wrong in '.Str::random(8),
        'failed_at' => now(),
    ]);
}

it('renders the list page and lists records', function () {
    $jobs = collect(range(1, 3))->map(fn () => makeFailedJob());

    Livewire::test(ListFailedJobs::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords($jobs);
});

it('retries a failed job through the row action', function () {
    $job = makeFailedJob();

    QueueManagement::spy();

    Livewire::test(ListFailedJobs::class)
        ->callTableAction('retry', $job);

    QueueManagement::shouldHaveReceived('retry')->with($job->id)->once();
});

it('forgets a failed job through the row action', function () {
    $job = makeFailedJob();

    QueueManagement::spy();

    Livewire::test(ListFailedJobs::class)
        ->callTableAction('forget', $job);

    QueueManagement::shouldHaveReceived('forget')->with($job->id)->once();
});

it('retries failed jobs through the bulk action', function () {
    $jobs = collect(range(1, 2))->map(fn () => makeFailedJob());

    QueueManagement::spy();

    Livewire::test(ListFailedJobs::class)
        ->callTableBulkAction('retry', $jobs);

    QueueManagement::shouldHaveReceived('retry')->once();
});

it('flushes all failed jobs through the header action', function () {
    makeFailedJob();

    QueueManagement::spy();

    Livewire::test(ListFailedJobs::class)
        ->callAction('flush');

    QueueManagement::shouldHaveReceived('flush')->once();
});

it('retries all failed jobs through the header action', function () {
    makeFailedJob();

    QueueManagement::spy();

    Livewire::test(ListFailedJobs::class)
        ->callAction('retryAll');

    QueueManagement::shouldHaveReceived('retryAll')->once();
});

it('filters failed jobs by queue', function () {
    $default = makeFailedJob('database', 'default');
    $emails = makeFailedJob('database', 'emails');

    Livewire::test(ListFailedJobs::class)
        ->filterTable('queue', 'emails')
        ->assertCanSeeTableRecords([$emails])
        ->assertCanNotSeeTableRecords([$default]);
});

it('is read-only and has no create page', function () {
    expect(FailedJobResource::getPages())->not->toHaveKey('create')
        ->and(FailedJobResource::canCreate())->toBeFalse();
});
