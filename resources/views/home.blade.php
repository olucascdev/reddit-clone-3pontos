<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-6">
        @auth
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                    Olá, <span class="text-indigo-600 dark:text-indigo-400">{{ auth()->user()->name }}</span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <x-stat-card
                        title="Quantidade de usuários"
                        :value="\App\Models\User::count()"
                        icon="users"
                        gradient="from-blue-500 to-surface border-blue-500"
                    />

                    <x-stat-card
                        title="Quantidade de posts"
                        :value="\App\Models\Post::count()"
                        icon="document-text"
                        gradient="from-green-500 to-surface border-green-500"
                    />

                    <x-stat-card
                        title="Quantidade de replies"
                        :value="\App\Models\Comment::count()"
                        icon="chat-bubble-oval-left"
                        gradient="from-purple-500 to-surface border-purple-500"
                    />
                </div>

                <div class="mt-6 rounded-t-[20px] bg-elevation-02dp border border-outline-light p-6 space-y-4">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                Veja os últimos posts das comunidades que você segue
            </h3>
        @endauth

        <div class="space-y-4">
            @forelse($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-8 text-center">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Nenhum post encontrado</h3>
                    <p class="text-gray-600 dark:text-gray-400">Seja o primeiro a criar um post!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
            </div>
            </div>
    </div>

</x-layouts.app>
