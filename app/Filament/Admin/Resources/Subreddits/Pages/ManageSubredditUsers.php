<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Pages;

use App\Filament\Admin\Resources\Subreddits\SubredditResource;
use BackedEnum;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class ManageSubredditUsers extends ManageRelatedRecords
{
    protected static string $resource = SubredditResource::class;

    protected static string $relationship = 'users';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    public static function getNavigationLabel(): string
    {
        return 'Usuários';
    }

    public function getTitle(): string
    {
        return 'Usuários Vinculados';
    }

    public function getBreadcrumb(): string
    {
        return 'Usuários Vinculados';
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
                TextColumn::make('email')
                    ->label('Email')
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
