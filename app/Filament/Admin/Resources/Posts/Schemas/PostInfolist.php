<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class PostInfolist
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
                        TextEntry::make('subreddit.name')
                            ->label('Subreddit'),
                        TextEntry::make('user.name')
                            ->label('Autor'),
                        TextEntry::make('title')
                            ->label('Título'),
                        SpatieMediaLibraryImageEntry::make('photo')
                            ->label('Foto')
                            ->disk('public')
                            ->circular()
                            ->ColumnSpanFull(),
                        TextEntry::make('content')
                            ->label('Conteúdo')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
