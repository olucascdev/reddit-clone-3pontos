<?php

declare(strict_types=1);

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', '3Pontos Community') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <script>
            if (
                localStorage.theme === 'dark' ||
                (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
            ) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body
        class="h-full bg-light-elevation-surface text-light-text-high dark:bg-dark-elevation-surface dark:text-dark-text-high"
    >
        <x-navbar />

        <div class="flex min-h-screen pt-16">
            <x-sidebar />
            <main class="flex-1 lg:ml-64">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
    </body>
</html>
<?php 
