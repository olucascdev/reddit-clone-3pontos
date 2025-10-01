<x-layouts.app>
    <div class="max-w-4xl mx-auto px-4 py-6">

        <article class="mb-6">
            <div class="p-6">

                <div class="flex items-center gap-3 mb-4">
                    @if($post->user->avatar)
                        <img src="{{ $post->user->avatar }}" class="w-10 h-10 rounded-full" alt="{{ $post->user->name }}">
                    @else
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ substr($post->user->name, 0, 1) }}
                        </div>
                    @endif
                    <div class="flex flex-col">
                        <span class="text-xxs font-primary text-light-text-medium dark:text-dark-text-medium">
                            {{ $post->user->name }}
                        </span>
                        <a href="{{ route('subreddit.show', $post->subreddit) }}"
                           class="text-xxs font-primary text-indigo-600 dark:text-indigo-400 hover:underline">
                            r/{{ $post->subreddit->name }}
                        </a>
                    </div>
                </div>

                <h1 class="text-[24px] font-secondary font-semibold text-light-text-high dark:text-dark-text-high mb-4">
                    {{ $post->title }}
                </h1>

                @if($post->photo)
                    <img src="{{ $post->photo }}"
                         alt="{{ $post->title }}"
                         class="max-w-[1024px] w-full h-[200px] object-cover rounded-lg mb-4">
                @endif


                @if($post->content)
                    <p class="text-xs font-primary text-light-text-medium dark:text-dark-text-medium mb-4">
                        {!! Str::limit(strip_tags($post->content), 300) !!}
                    </p>
                @endif
            </div>
        </article>


        @auth
            <div class="p-6 mb-6">
                <livewire:comment-form :post="$post" :key="'post-comment-form'" />
            </div>
        @else
            <div class="p-6 mb-6 text-center">
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Faça login para comentar
                </p>
                <a href="{{ route('register') }}"
                   class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                    Registrar
                </a>
            </div>
        @endauth

        <div class="mt-6 rounded-t-[20px] bg-elevation-02dp border border-outline-light p-6 space-y-4">
        <div class="p-6">
            <h2 class="text-[20px] font-secondary font-semibold text-light-text-high dark:text-dark-text-high mb-6">
                Todas as respostas
            </h2>

            @forelse($post->comments as $comment)
                <x-comment-card :comment="$comment" />
            @empty
                <p class="text-center text-gray-600 dark:text-gray-400 py-8">
                    Nenhum comentário ainda. Seja o primeiro a comentar!
                </p>
            @endforelse
        </div>
        </div>
    </div>
</x-layouts.app>
