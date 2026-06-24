<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs;

use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\Pages\ListFailedJobs;
use JeffersonGoncalves\Filament\QueueManagement\Resources\FailedJobs\Pages\ViewFailedJob;
use JeffersonGoncalves\Filament\QueueManagement\Support\Utils;
use JeffersonGoncalves\QueueManagement\Facades\QueueManagement;
use JeffersonGoncalves\QueueManagement\Models\FailedJob;

class FailedJobResource extends Resource
{
    protected static ?string $model = FailedJob::class;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label(__('filament-queue-management::filament-queue-management.column.id')),
                        TextEntry::make('uuid')
                            ->label(__('filament-queue-management::filament-queue-management.column.uuid')),
                        TextEntry::make('connection')
                            ->label(__('filament-queue-management::filament-queue-management.column.connection')),
                        TextEntry::make('queue')
                            ->label(__('filament-queue-management::filament-queue-management.column.queue')),
                        TextEntry::make('displayName')
                            ->label(__('filament-queue-management::filament-queue-management.column.name')),
                        TextEntry::make('failed_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.failed_at'))
                            ->dateTime(),
                    ]),
                Section::make(__('filament-queue-management::filament-queue-management.column.payload'))
                    ->schema([
                        TextEntry::make('payload')
                            ->hiddenLabel()
                            ->formatStateUsing(fn ($state): string => self::formatJson($state))
                            ->fontFamily('mono')
                            ->copyable(),
                    ]),
                Section::make(__('filament-queue-management::filament-queue-management.column.exception'))
                    ->schema([
                        TextEntry::make('exception')
                            ->hiddenLabel()
                            ->fontFamily('mono')
                            ->copyable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('filament-queue-management::filament-queue-management.column.id'))
                    ->sortable(),
                TextColumn::make('connection')
                    ->label(__('filament-queue-management::filament-queue-management.column.connection'))
                    ->sortable(),
                TextColumn::make('queue')
                    ->label(__('filament-queue-management::filament-queue-management.column.queue'))
                    ->sortable(),
                TextColumn::make('displayName')
                    ->label(__('filament-queue-management::filament-queue-management.column.name')),
                TextColumn::make('exception')
                    ->label(__('filament-queue-management::filament-queue-management.column.exception'))
                    ->limit(60)
                    ->searchable(),
                TextColumn::make('failed_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.failed_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('connection')
                    ->label(__('filament-queue-management::filament-queue-management.column.connection'))
                    ->options(fn (): array => FailedJob::query()
                        ->orderBy('connection')
                        ->pluck('connection', 'connection')
                        ->unique()
                        ->all()),
                SelectFilter::make('queue')
                    ->label(__('filament-queue-management::filament-queue-management.column.queue'))
                    ->options(fn (): array => FailedJob::query()
                        ->orderBy('queue')
                        ->pluck('queue', 'queue')
                        ->unique()
                        ->all()),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('retry')
                    ->label(__('filament-queue-management::filament-queue-management.actions.retry.label'))
                    ->icon('heroicon-o-arrow-path')
                    ->color('primary')
                    ->requiresConfirmation()
                    ->action(function (FailedJob $record): void {
                        QueueManagement::retry($record->id);

                        Notification::make()
                            ->success()
                            ->title(__('filament-queue-management::filament-queue-management.actions.retry.success'))
                            ->send();
                    }),
                Action::make('forget')
                    ->label(__('filament-queue-management::filament-queue-management.actions.forget.label'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (FailedJob $record): void {
                        QueueManagement::forget($record->id);

                        Notification::make()
                            ->success()
                            ->title(__('filament-queue-management::filament-queue-management.actions.forget.success'))
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('retry')
                        ->label(__('filament-queue-management::filament-queue-management.actions.retry.label'))
                        ->icon('heroicon-o-arrow-path')
                        ->color('primary')
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->action(function (Collection $records): void {
                            QueueManagement::retry(...$records->pluck('id')->all());

                            Notification::make()
                                ->success()
                                ->title(__('filament-queue-management::filament-queue-management.actions.retry.success'))
                                ->send();
                        }),
                    BulkAction::make('forget')
                        ->label(__('filament-queue-management::filament-queue-management.actions.forget.label'))
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->action(function (Collection $records): void {
                            $records->pluck('id')->each(fn ($id) => QueueManagement::forget((int) $id));

                            Notification::make()
                                ->success()
                                ->title(__('filament-queue-management::filament-queue-management.actions.forget.success'))
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFailedJobs::route('/'),
            'view' => ViewFailedJob::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.failed_job.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.failed_job.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return Utils::getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getNavigationSort();
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return Utils::getFailedJobsNavigationIcon();
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getEloquentQuery()->count();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return Utils::getFailedJobsSlug();
    }

    protected static function formatJson(mixed $state): string
    {
        return (string) json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
