<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\FailedJobResource;
use JeffersonGoncalves\QueueManagement\Facades\QueueManagement;

class ListFailedJobs extends ListRecords
{
    protected static string $resource = FailedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('retryAll')
                ->label(__('filament-queue-management::filament-queue-management.actions.retry_all.label'))
                ->icon('heroicon-o-arrow-path')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function (): void {
                    QueueManagement::retryAll();

                    Notification::make()
                        ->success()
                        ->title(__('filament-queue-management::filament-queue-management.actions.retry_all.success'))
                        ->send();
                }),
            Action::make('flush')
                ->label(__('filament-queue-management::filament-queue-management.actions.flush.label'))
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (): void {
                    QueueManagement::flush();

                    Notification::make()
                        ->success()
                        ->title(__('filament-queue-management::filament-queue-management.actions.flush.success'))
                        ->send();
                }),
        ];
    }
}
