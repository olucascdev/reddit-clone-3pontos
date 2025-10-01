<?php

declare(strict_types=1);

?>
@props([
    'comment',
    'depth' => 0,
])

<div
    id="comment-{{ $comment->id }}"
    class="{{ $depth > 0 ? 'ml-8 pl-4' : '' }} {{ $depth > 0 ? 'border-gray-200 dark:border-gray-700' : 'border-transparent' }} border-l-2"
>
    <div class="py-3">
        <div class="mb-2 flex items-center gap-2">
            @if ($comment->user->avatar)
                <img
                    src="{{ $comment->user->avatar }}"
                    class="h-6 w-6 rounded-full"
                    alt="{{ $comment->user->name }}"
                />
            @else
                <div
                    class="flex h-6 w-6 items-center justify-center rounded-full bg-indigo-500 text-xs font-semibold text-white"
                >
                    {{ substr($comment->user->name, 0, 1) }}
                </div>
            @endif
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->name }}</span>
            <span class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            @if ($comment->parent_comment_id)
                <span class="text-xs font-medium text-green-600 dark:text-green-400">Resposta</span>
            @endif
        </div>

        <div class="prose mb-2 max-w-none text-gray-700 dark:prose-invert dark:text-gray-300">
            {!! Str::markdown($comment->content) !!}
        </div>

        <div class="flex items-center gap-4">
            <livewire:vote-button :votable="$comment" :key="'comment-'.$comment->id" />

            @auth
                <livewire:comment-form :parent-comment="$comment" :key="'reply-form-'.$comment->id" />
            @else
                <a
                    href="{{ route('register') }}"
                    class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400"
                >
                    Responder
                </a>
            @endauth
        </div>
    </div>

    @if ($comment->replies && $comment->replies->count() > 0)
        @foreach ($comment->replies as $reply)
            <x-comment-card :comment="$reply" :depth="$depth + 1" />
        @endforeach
    @endif
</div>
<?php 
