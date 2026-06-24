<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\Pages;

use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\JobResource;

class ListJobs extends ListRecords
{
    protected static string $resource = JobResource::class;
}
