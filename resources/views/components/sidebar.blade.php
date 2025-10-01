<?php

declare(strict_types=1);

?>
<aside
    class="fixed bottom-0 left-0 top-0 z-50 hidden w-64 flex-col overflow-y-auto border-r border-light-outline-light bg-light-elevation-01dp dark:border-dark-outline-low dark:bg-dark-elevation-01dp lg:flex"
>
    <!-- Espaço da Logo + Ícone -->
    <div class="flex h-16 items-center justify-between px-4">
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-dark.svg') }}" alt="Logo" class="h-8 dark:hidden" />
            <img src="{{ asset('images/logo.svg') }}" alt="Logo Dark" class="hidden h-8 dark:block" />
        </div>

        <!-- Ícone Heroicon -->
        <button class="rounded p-2 hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp">
            <x-heroicon-o-chevron-left class="h-5 w-5 text-light-icon-high dark:text-dark-icon-high" />
        </button>
    </div>

    <!-- Conteúdo do Sidebar -->
    <div class="flex-1 overflow-y-auto p-3">
        <!-- Home -->
        <a
            href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'bg-light-elevation-02dp dark:bg-dark-elevation-02dp' : '' }} flex items-center gap-2 rounded-lg px-3 py-2 hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp"
        >
            <x-heroicon-o-home class="h-5 w-5 text-light-icon-high dark:text-dark-icon-high" />
            <span class="text-xs font-medium text-light-text-high dark:text-dark-text-high">Home</span>
        </a>

        <!-- Minhas Comunidades -->
        <div class="mt-6">
            <h3
                class="px-3 text-[10px] font-semibold uppercase tracking-wide text-light-text-low dark:text-dark-text-low"
            >
                Minhas comunidades
            </h3>

            @auth
                @php
                    $userSubreddits = auth()
                        ->user()
                        ->subreddits()
                        ->withCount('posts')
                        ->limit(10)
                        ->get();
                @endphp

                @forelse ($userSubreddits as $subreddit)
                    <a
                        href="{{ route('subreddit.show', $subreddit) }}"
                        class="mt-2 flex items-center justify-between gap-2 rounded-lg px-3 py-2 hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp"
                    >
                        <div class="flex items-center gap-2">
                            @if ($subreddit->photo)
                                <img
                                    src="{{ $subreddit->photo }}"
                                    class="h-6 w-6 rounded-full"
                                    alt="{{ $subreddit->name }}"
                                />
                            @else
                                <div
                                    class="flex h-6 w-6 items-center justify-center rounded-full bg-gradient-to-br from-brand-primary to-purple-primary text-xs font-semibold text-white"
                                >
                                    {{ substr($subreddit->name, 0, 1) }}
                                </div>
                            @endif
                            <span class="text-xs font-medium text-light-text-high dark:text-dark-text-high">
                                {{ $subreddit->name }}
                            </span>
                        </div>
                        <span
                            class="rounded-full bg-light-elevation-02dp px-2 py-1 text-[9px] text-light-text-low dark:bg-dark-elevation-02dp dark:text-dark-text-low"
                        >
                            +{{ $subreddit->posts_count }}
                        </span>
                    </a>
                @empty
                    <p class="px-3 py-2 text-sm text-light-text-medium dark:text-dark-text-medium">
                        Você ainda não segue nenhuma comunidade.
                    </p>
                @endforelse
            @else
                <p class="px-3 py-2 text-sm text-light-text-medium dark:text-dark-text-medium">
                    <a href="/login" class="text-brand-primary hover:text-brand-500">Faça login</a>
                    para ver suas comunidades.
                </p>
            @endauth
        </div>
    </div>
</aside>
<?php 
