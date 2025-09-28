<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Posts\Pages;

use App\Filament\Admin\Resources\Posts\PostResource;
use Filament\Resources\Pages\ViewRecord;

final class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;

    protected static ?string $navigationLabel = 'Visualizar';

    protected static ?string $title = 'Visualizar';

    protected static ?string $breadcrumb = 'Visualizar';

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
