<?php

declare(strict_types=1);

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

final class PostsWidgets extends ChartWidget
{
    protected ?string $heading = 'Posts por Dia';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Posts Criados',
                    'data' => [
                        2, 1, 3, 0, 4, 5, 2, 3, 1, 2,
                        4, 3, 2, 1, 0, 5, 3, 4, 2, 1,
                        3, 5, 2, 4, 1, 3, 2, 4, 5, 3,
                    ],
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59,130,246,0.2)',
                ],
            ],
            'labels' => [
                '01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
