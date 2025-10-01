<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->revealable()
                    ->maxLength(255)
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),

                SpatieMediaLibraryFileUpload::make('avatar')
                    ->label('Foto')
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->disk('public')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/*'])
                    ->columnSpanFull(),

            ]);
    }
}
