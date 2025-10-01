<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('photo'),
                Textarea::make('content')
                    ->columnSpanFull(),
            ]);
    }
}
