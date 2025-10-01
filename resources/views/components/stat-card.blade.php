<?php

declare(strict_types=1);

?>
@props([
    'title',
    'value',
    'icon',
    'gradient',
    'borderColor' => '',
])

<div
    class="{{ $gradient }} {{ $borderColor }} h-[108px] w-full rounded-[12px] border bg-gradient-to-br p-4 text-white"
>
    <div class="flex h-full items-center gap-3">
        <div class="flex items-center justify-center rounded-lg bg-white/20 p-3">
            @php
                $iconComponent = "heroicon-o-{$icon}";
            @endphp

            <x-dynamic-component :component="$iconComponent" class="h-6 w-6 text-white dark:text-white" />
        </div>
        <div class="flex flex-col justify-center">
            <p class="text-sm font-medium text-white dark:text-white/90">{{ $title }}</p>
            <p class="text-2xl font-bold text-white dark:text-white">{{ $value }}</p>
        </div>
    </div>
</div>
<?php 
