<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\FailedJobResource;

class ViewFailedJob extends ViewRecord
{
    protected static string $resource = FailedJobResource::class;
}
