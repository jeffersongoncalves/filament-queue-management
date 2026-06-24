<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs;

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
use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\Pages\ListJobs;
use JeffersonGoncalves\Filament\QueueManagement\Resources\Jobs\Pages\ViewJob;
use JeffersonGoncalves\Filament\QueueManagement\Support\Utils;
use JeffersonGoncalves\QueueManagement\Facades\QueueManagement;
use JeffersonGoncalves\QueueManagement\Models\Job;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label(__('filament-queue-management::filament-queue-management.column.id')),
                        TextEntry::make('queue')
                            ->label(__('filament-queue-management::filament-queue-management.column.queue')),
                        TextEntry::make('displayName')
                            ->label(__('filament-queue-management::filament-queue-management.column.name')),
                        TextEntry::make('attempts')
                            ->label(__('filament-queue-management::filament-queue-management.column.attempts')),
                        TextEntry::make('available_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.available_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                        TextEntry::make('reserved_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.reserved_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                        TextEntry::make('created_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.created_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                    ]),
                Section::make(__('filament-queue-management::filament-queue-management.column.payload'))
                    ->schema([
                        TextEntry::make('payload')
                            ->hiddenLabel()
                            ->formatStateUsing(fn ($state): string => self::formatJson($state))
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
                TextColumn::make('queue')
                    ->label(__('filament-queue-management::filament-queue-management.column.queue'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('displayName')
                    ->label(__('filament-queue-management::filament-queue-management.column.name')),
                TextColumn::make('attempts')
                    ->label(__('filament-queue-management::filament-queue-management.column.attempts'))
                    ->sortable(),
                TextColumn::make('delay')
                    ->label(__('filament-queue-management::filament-queue-management.column.delay')),
                TextColumn::make('available_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.available_at'))
                    ->formatStateUsing(fn ($state) => self::formatTimestamp($state))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.created_at'))
                    ->formatStateUsing(fn ($state) => self::formatTimestamp($state))
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('queue')
                    ->label(__('filament-queue-management::filament-queue-management.column.queue'))
                    ->options(fn (): array => Job::query()
                        ->orderBy('queue')
                        ->pluck('queue', 'queue')
                        ->unique()
                        ->all()),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make('delete')
                    ->label(__('filament-queue-management::filament-queue-management.actions.delete.label'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function (Job $record): void {
                        QueueManagement::deletePendingJob($record->id);

                        Notification::make()
                            ->success()
                            ->title(__('filament-queue-management::filament-queue-management.actions.delete.success'))
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('delete')
                        ->label(__('filament-queue-management::filament-queue-management.actions.delete.label'))
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->action(function (Collection $records): void {
                            $records->pluck('id')->each(fn ($id) => QueueManagement::deletePendingJob((int) $id));

                            Notification::make()
                                ->success()
                                ->title(__('filament-queue-management::filament-queue-management.actions.delete.success'))
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobs::route('/'),
            'view' => ViewJob::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.job.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.job.plural_label');
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
        return Utils::getJobsNavigationIcon();
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getEloquentQuery()->count();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return Utils::getJobsSlug();
    }

    protected static function formatTimestamp(mixed $state): ?string
    {
        if (blank($state)) {
            return null;
        }

        return Carbon::createFromTimestamp((int) $state)->toDateTimeString();
    }

    protected static function formatJson(mixed $state): string
    {
        return (string) json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
