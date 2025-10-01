<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                TextColumn::make('subreddit.name')
                    ->label('Subreddit')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Autor')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->sortable()
                    ->date('d/m/Y'),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Visualizar')
                    ->modalHeading('Visualizar')
                    ->modalWidth('xl')
                    ->modal(),
                DeleteAction::make()
                    ->label('Excluir'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
