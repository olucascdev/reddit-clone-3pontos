<?php

declare(strict_types=1);

?>
<div class="flex items-center gap-1">
    <button
        wire:click="vote(1)"
        class="{{ $currentVote === 1 ? "bg-orange-primary/10 text-orange-primary" : "text-light-icon-medium hover:bg-light-elevation-02dp dark:text-dark-icon-medium dark:hover:bg-dark-elevation-02dp" }} rounded-lg p-2 transition-colors"
        @guest
            onclick="event.preventDefault(); window.location='/register'"
        @endguest
        title="Upvote"
    >
        <svg
            class="h-5 w-5"
            fill="{{ $currentVote === 1 ? "currentColor" : "none" }}"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <button
        wire:click="vote(-1)"
        class="{{ $currentVote === -1 ? "bg-brand-primary/10 text-brand-primary" : "text-light-icon-medium hover:bg-light-elevation-02dp dark:text-dark-icon-medium dark:hover:bg-dark-elevation-02dp" }} rounded-lg p-2 transition-colors"
        @guest
            onclick="event.preventDefault(); window.location='/register'"
        @endguest
        title="Downvote"
    >
        <svg
            class="h-5 w-5"
            fill="{{ $currentVote === -1 ? "currentColor" : "none" }}"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</div>
<?php 
