<?php

declare(strict_types=1);

?>
@props([
    'post',
])
<article
    class="rounded-lg border border-light-outline-light bg-light-elevation-02dp transition-colors hover:border-light-outline-medium dark:border-dark-outline-low dark:bg-dark-elevation-02dp dark:hover:border-dark-outline-medium"
>
    <div class="flex h-full flex-col justify-center gap-3 p-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('subreddit.show', $post->subreddit) }}" class="flex items-center gap-2 hover:underline">
                @if ($post->subreddit->photo)
                    <img
                        src="{{ $post->subreddit->photo }}"
                        class="h-6 w-6 rounded-full"
                        alt="{{ $post->subreddit->name }}"
                    />
                @else
                    <div class="h-6 w-6 rounded-full bg-gradient-to-br from-brand-primary to-purple-primary"></div>
                @endif
                <span class="font-primary text-[16px] font-normal text-light-text-high dark:text-dark-text-high">
                    r/{{ $post->subreddit->name }}
                </span>
            </a>
        </div>

        <a href="{{ route('post.show', [$post->subreddit, $post]) }}" class="block">
            <h2
                class="font-secondary text-[20px] font-semibold text-light-text-high hover:text-brand-primary dark:text-dark-text-high dark:hover:text-brand-400"
            >
                {{ $post->title }}
            </h2>
        </a>

        @if ($post->content)
            <p class="line-clamp-3 font-primary text-[16px] text-light-text-medium dark:text-dark-text-medium">
                {{ Str::limit(strip_tags($post->content), 200) }}
            </p>
        @endif

        @if ($post->photo)
            <img src="{{ $post->photo }}" alt="{{ $post->title }}" class="w-full rounded-lg" />
        @endif

        <div class="mt-2 flex items-center gap-4">
            <div class="flex items-center gap-4">
                <a
                    href="{{ route('post.show', [$post->subreddit, $post]) }}"
                    class="flex items-center gap-2 rounded-lg px-3 py-2 text-light-text-medium hover:bg-light-elevation-02dp dark:text-dark-text-medium dark:hover:bg-dark-elevation-02dp"
                >
                    <x-heroicon-o-chat-bubble-oval-left class="h-5 w-5" />
                    <span class="text-sm font-medium">{{ $post->comments_count ?? 0 }}</span>
                </a>
            </div>

            <livewire:vote-button :votable="$post" :key="'post-'.$post->id" />
        </div>
    </div>
</article>
<?php 
