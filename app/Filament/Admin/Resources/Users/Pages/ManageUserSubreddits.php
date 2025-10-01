<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use BackedEnum;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class ManageUserSubreddits extends ManageRelatedRecords
{
    protected static string $resource = UserResource::class;

    protected static string $relationship = 'subreddits';

    protected static ?string $navigationLabel = 'Subreddits';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    public static function getNavigationLabel(): string
    {
        return 'Subreddits';
    }

    public function getTitle(): string
    {
        return 'Subreddits Vinculados';
    }

    public function getBreadcrumb(): string
    {
        return 'Subreddits Vinculados';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->recordActions([

            ])
            ->toolbarActions([
            ]);
    }
}
