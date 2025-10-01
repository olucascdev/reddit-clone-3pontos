<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

final class ChartsWidgets extends ChartWidget
{
    protected ?string $heading = 'Usuários por Dia';

    protected function getData(): array
    {

        $labels = [];
        $data = [];

        for ($i = 30; $i >= 1; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('d/m');

            $count = User::query()->whereDate('created_at', $date->toDateString())->count();
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Usuários Criados',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
