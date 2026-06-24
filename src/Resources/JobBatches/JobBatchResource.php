<?php

namespace JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\Pages\ListJobBatches;
use JeffersonGoncalves\Filament\QueueManagement\Resources\JobBatches\Pages\ViewJobBatch;
use JeffersonGoncalves\Filament\QueueManagement\Support\Utils;
use JeffersonGoncalves\QueueManagement\Models\JobBatch;

class JobBatchResource extends Resource
{
    protected static ?string $model = JobBatch::class;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label(__('filament-queue-management::filament-queue-management.column.id')),
                        TextEntry::make('name')
                            ->label(__('filament-queue-management::filament-queue-management.column.name')),
                        TextEntry::make('total_jobs')
                            ->label(__('filament-queue-management::filament-queue-management.column.total_jobs')),
                        TextEntry::make('pending_jobs')
                            ->label(__('filament-queue-management::filament-queue-management.column.pending_jobs')),
                        TextEntry::make('failed_jobs')
                            ->label(__('filament-queue-management::filament-queue-management.column.failed_jobs')),
                        TextEntry::make('cancelled_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.cancelled_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                        TextEntry::make('created_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.created_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                        TextEntry::make('finished_at')
                            ->label(__('filament-queue-management::filament-queue-management.column.finished_at'))
                            ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                    ]),
                Section::make(__('filament-queue-management::filament-queue-management.column.failed_job_ids'))
                    ->schema([
                        TextEntry::make('failed_job_ids')
                            ->hiddenLabel()
                            ->formatStateUsing(fn ($state): string => self::formatJson($state))
                            ->copyable(),
                    ]),
                Section::make(__('filament-queue-management::filament-queue-management.column.options'))
                    ->schema([
                        TextEntry::make('options')
                            ->hiddenLabel()
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
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('filament-queue-management::filament-queue-management.column.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('total_jobs')
                    ->label(__('filament-queue-management::filament-queue-management.column.total_jobs')),
                TextColumn::make('pending_jobs')
                    ->label(__('filament-queue-management::filament-queue-management.column.pending_jobs')),
                TextColumn::make('failed_jobs')
                    ->label(__('filament-queue-management::filament-queue-management.column.failed_jobs')),
                TextColumn::make('cancelled_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.cancelled_at'))
                    ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
                TextColumn::make('created_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.created_at'))
                    ->formatStateUsing(fn ($state) => self::formatTimestamp($state))
                    ->sortable(),
                TextColumn::make('finished_at')
                    ->label(__('filament-queue-management::filament-queue-management.column.finished_at'))
                    ->formatStateUsing(fn ($state) => self::formatTimestamp($state)),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobBatches::route('/'),
            'view' => ViewJobBatch::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.job_batch.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-queue-management::filament-queue-management.resource.job_batch.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return Utils::getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getNavigationSort();
    }

    public static function getNavigationIcon(): ?string
    {
        return Utils::getJobBatchesNavigationIcon();
    }

    public static function getSlug(): string
    {
        return Utils::getJobBatchesSlug();
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
