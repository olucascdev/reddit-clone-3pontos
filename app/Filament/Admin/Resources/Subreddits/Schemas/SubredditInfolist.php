<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class SubredditInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Informações')
                    ->columns([
                        'default' => 1,
                        'md' => 2,
                        'xl' => 3,
                    ])
                    ->ColumnSpanFull()
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('photo')
                            ->label('Foto')
                            ->disk('public')
                            ->circular()
                            ->ColumnSpanFull(),

                        SpatieMediaLibraryImageEntry::make('banner')
                            ->label('Banner')
                            ->disk('public')
                            ->circular()
                            ->ColumnSpanFull(),

                        TextEntry::make('name')
                            ->label('Nome'),

                        TextEntry::make('created_at')
                            ->label('Criado em')
                            ->dateTime('d/m/Y H:i'),

                        TextEntry::make('description')
                            ->label('Descrição')
                            ->ColumnSpanFull(),
                    ]),
            ]);
    }
}
