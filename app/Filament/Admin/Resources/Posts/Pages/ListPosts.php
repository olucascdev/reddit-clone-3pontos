<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Pages;

use App\Filament\Admin\Resources\Posts\PostResource;
use Filament\Resources\Pages\ListRecords;

final class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected static ?string $breadcrumb = 'Listar';

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
