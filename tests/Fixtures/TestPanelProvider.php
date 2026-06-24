<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\QueueManagement\FilamentQueueManagementPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                FilamentQueueManagementPlugin::make(),
            ]);
    }
}
