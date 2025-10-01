<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Pages;

use App\Filament\Admin\Resources\Subreddits\SubredditResource;
use Filament\Resources\Pages\EditRecord;

final class EditSubreddit extends EditRecord
{
    protected static string $resource = SubredditResource::class;

    protected static ?string $navigationLabel = 'Editar';

    protected static ?string $title = 'Editar';

    protected static ?string $breadcrumb = 'Editar';

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
