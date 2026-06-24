<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\JobResource;

class ViewJob extends ViewRecord
{
    protected static string $resource = JobResource::class;
}
