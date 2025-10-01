<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-6">

        <div class="rounded-lg mb-6 overflow-hidden">

            @if($subreddit->banner)
                <div class="h-32 bg-cover bg-center" style="background-image: url('{{ $subreddit->banner }}')"></div>
            @else
                <div class="h-32 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
            @endif

            <div class="p-6">
                <div class="flex items-start gap-4">
                    @if($subreddit->photo)
                        <img src="{{ $subreddit->photo }}" class="w-20 h-20 rounded-full border-4 border-white dark:border-gray-800 -mt-10" alt="{{ $subreddit->name }}">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-white text-2xl font-bold border-4 border-white dark:border-gray-800 -mt-10">
                            {{ substr($subreddit->name, 0, 1) }}
                        </div>
                    @endif

                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">r/{{ $subreddit->name }}</h1>
                                @if($subreddit->description)
                                    <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $subreddit->description }}</p>
                                @endif
                            </div>

                            @auth
                                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                                    Entrou
                                </button>
                            @else
                                <a href="{{ route('register') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                                    Entrar
                                </a>
                            @endauth
                        </div>

                        <div class="flex items-center gap-6 mt-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span class="font-semibold">{{ $subreddit->users_count ?? 0 }}</span>
                                <span>membros</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Criado em {{ $subreddit->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 rounded-t-[20px] bg-elevation-02dp border border-outline-light p-6 space-y-4">

        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
            Veja todos os posts da comunidade
        </h2>

        <div class="space-y-4">
            @forelse($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-8 text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Nenhum post ainda</h3>
                    <p class="text-gray-600 dark:text-gray-400">Seja o primeiro a postar nesta comunidade!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
    </div>
</x-layouts.app>
