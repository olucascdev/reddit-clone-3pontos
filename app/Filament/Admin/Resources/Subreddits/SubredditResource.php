<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits;

use App\Filament\Admin\Resources\Subreddits\Pages\CreateSubreddit;
use App\Filament\Admin\Resources\Subreddits\Pages\EditSubreddit;
use App\Filament\Admin\Resources\Subreddits\Pages\ListSubreddits;
use App\Filament\Admin\Resources\Subreddits\Pages\ManageSubredditUsers;
use App\Filament\Admin\Resources\Subreddits\Schemas\SubredditForm;
use App\Filament\Admin\Resources\Subreddits\Schemas\SubredditInfolist;
use App\Filament\Admin\Resources\Subreddits\Tables\SubredditsTable;
use App\Models\Subreddit;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class SubredditResource extends Resource
{
    protected static ?string $model = Subreddit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Subreddits';

    protected static ?string $pluralLabel = 'Subreddits';

    protected static ?string $label = 'Subreddits';

    protected static ?string $slug = 'subreddit';

    public static function form(Schema $schema): Schema
    {
        return SubredditForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubredditInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubredditsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            EditSubreddit::class,
            ManageSubredditUsers::class,

        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubreddits::route('/'),
            'create' => CreateSubreddit::route('/criar'),
            'edit' => EditSubreddit::route('/{record}/editar'),
            'users' => ManageSubredditUsers::route('/{record}/usuarios'),
        ];
    }
}
