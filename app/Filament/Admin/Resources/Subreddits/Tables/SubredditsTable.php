<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class SubredditsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
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
                EditAction::make()
                    ->label('Editar'),
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
