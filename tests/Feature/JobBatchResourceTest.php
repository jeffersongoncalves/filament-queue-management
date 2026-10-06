<?php

use Illuminate\Support\Str;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\JobBatchResource;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\Pages\ListJobBatches;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\Pages\ViewJobBatch;
use JeffersonGoncalves\Filament\QueueManagement\Tests\Fixtures\TestUser;
use JeffersonGoncalves\QueueManagement\Models\JobBatch;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(TestUser::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@example.com',
    ]));
});

function makeJobBatch(string $name = 'Import'): JobBatch
{
    return JobBatch::forceCreate([
        'id' => (string) Str::uuid(),
        'name' => $name,
        'total_jobs' => 10,
        'pending_jobs' => 2,
        'failed_jobs' => 1,
        'failed_job_ids' => ['abc-123'],
        'options' => serialize(['allowFailures' => true]),
    ]);
}

it('renders the list page and lists records', function () {
    $batches = collect(range(1, 3))->map(fn ($i) => makeJobBatch("Batch {$i}"));

    Livewire::test(ListJobBatches::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords($batches);
});

it('renders the view page with decoded options and failed job ids', function () {
    $batch = makeJobBatch();

    Livewire::test(ViewJobBatch::class, ['record' => $batch->getKey()])
        ->assertSuccessful()
        ->assertSee('"allowFailures": true')
        ->assertSee('"abc-123"');
});

it('decodes base64-encoded options stored by PostgreSQL connections', function () {
    $batch = makeJobBatch();
    $batch->forceFill(['options' => base64_encode(serialize(['queue' => 'imports']))])->save();

    Livewire::test(ViewJobBatch::class, ['record' => $batch->getKey()])
        ->assertSuccessful()
        ->assertSee('"queue": "imports"');
});

it('exposes only index and view pages', function () {
    expect(JobBatchResource::getPages())
        ->toHaveKey('index')
        ->toHaveKey('view')
        ->not->toHaveKey('create');
});

it('is read-only', function () {
    expect(JobBatchResource::canCreate())->toBeFalse();
});
