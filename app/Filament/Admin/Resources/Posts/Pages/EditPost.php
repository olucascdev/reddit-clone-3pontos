<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Pages;

use App\Filament\Admin\Resources\Posts\PostResource;
use Filament\Resources\Pages\EditRecord;

final class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected static ?string $navigationLabel = 'Editar';

    protected static ?string $title = 'Editar';

    protected static ?string $breadcrumb = 'Editar';

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
