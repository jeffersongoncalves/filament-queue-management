<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\Pages;

use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\JobBatchResource;

class ListJobBatches extends ListRecords
{
    protected static string $resource = JobBatchResource::class;
}
