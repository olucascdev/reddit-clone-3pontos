<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class HeaderWidgets extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Usuários', User::query()->count())
                ->description('Quantidade Total')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 3, 5])
                ->color('info'),

            Stat::make('Subreddits', Subreddit::query()->count())
                ->description('Quantidade Total')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 3, 5, 2])
                ->color('warning'),
            Stat::make('Posts ', Post::query()->count())
                ->description('Quantidade Total')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 3, 5, 10])
                ->color('gray'),
        ];
    }
}
