<?php

use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\JobResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\Pages\ListJobs;
use JeffersonGoncalves\Filament\QueueManagement\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QueueManagement\Facades\QueueManagement;
use JeffersonGoncalves\QueueManagement\Models\Job;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(TestUser::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@example.com',
    ]));
});

function makeJob(string $queue = 'default', string $name = 'App\\Jobs\\SendEmail'): Job
{
    return Job::create([
        'queue' => $queue,
        'attempts' => 0,
        'payload' => ['displayName' => $name, 'maxTries' => 3, 'delay' => 0],
    ]);
}

it('renders the list page and lists records', function () {
    $jobs = collect(range(1, 3))->map(fn () => makeJob());

    Livewire::test(ListJobs::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords($jobs);
});

it('deletes a pending job through the row action', function () {
    $job = makeJob();

    Livewire::test(ListJobs::class)
        ->callTableAction('delete', $job);

    $this->assertModelMissing($job);
});

it('deletes pending jobs through the bulk action', function () {
    $jobs = collect(range(1, 2))->map(fn () => makeJob());

    Livewire::test(ListJobs::class)
        ->callTableBulkAction('delete', $jobs);

    foreach ($jobs as $job) {
        $this->assertModelMissing($job);
    }
});

it('filters jobs by queue', function () {
    $default = makeJob('default');
    $emails = makeJob('emails');

    Livewire::test(ListJobs::class)
        ->filterTable('queue', 'emails')
        ->assertCanSeeTableRecords([$emails])
        ->assertCanNotSeeTableRecords([$default]);
});

it('is read-only and has no create page', function () {
    expect(JobResource::getPages())->not->toHaveKey('create')
        ->and(JobResource::canCreate())->toBeFalse();
});

it('wires the row delete action to the queue manager service', function () {
    $job = makeJob();

    QueueManagement::spy();

    Livewire::test(ListJobs::class)
        ->callTableAction('delete', $job);

    QueueManagement::shouldHaveReceived('deletePendingJob')->with($job->id)->once();
});
