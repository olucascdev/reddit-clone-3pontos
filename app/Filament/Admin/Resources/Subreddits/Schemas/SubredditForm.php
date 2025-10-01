<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class SubredditForm
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
                        SpatieMediaLibraryFileUpload::make('photo')
                            ->label('Foto')
                            ->avatar()
                            ->imageEditor()
                            ->circleCropper()
                            ->disk('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/*'])
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('banner')
                            ->label('Banner')
                            ->imageEditor()
                            ->disk('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/*'])
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descrição')
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
