<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class UserInfolist
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
                        SpatieMediaLibraryImageEntry::make('avatar')
                            ->label('Foto')
                            ->disk('public')
                            ->circular()
                            ->ColumnSpanFull(),

                        TextEntry::make('name')
                            ->label('Nome'),

                        TextEntry::make('email')
                            ->label('Email'),

                        TextEntry::make('created_at')
                            ->label('Criado em')
                            ->dateTime('d/m/Y H:i'),
                    ]),

            ]);
    }
}
