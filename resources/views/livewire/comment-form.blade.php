<?php

declare(strict_types=1);

?>
<div>
    @if ($post)
        <form
            wire:submit="submit"
            class="rounded-xl border border-light-outline-light bg-light-elevation-01dp p-2 dark:border-dark-outline-low dark:bg-dark-elevation-01dp"
        >
            <textarea
                wire:model="content"
                placeholder="Adicionar um comentário..."
                rows="4"
                class="w-full resize-none border-0 bg-transparent px-0 py-0 text-light-text-high placeholder:text-light-text-low focus:outline-none focus:ring-0 dark:text-dark-text-high dark:placeholder:text-dark-text-low"
            ></textarea>

            @error('content')
                <p class="mt-2 text-sm text-red-primary">{{ $message }}</p>
            @enderror

            <div class="mt-4 flex justify-end border-t border-light-outline-light pt-4 dark:border-dark-outline-low">
                <button
                    type="submit"
                    class="rounded-lg bg-indigo-primary px-6 py-2 font-semibold text-white hover:bg-indigo-500 disabled:cursor-not-allowed disabled:opacity-50"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Responder</span>
                    <span wire:loading>Enviando...</span>
                </button>
            </div>
        </form>
    @elseif ($parentComment)
        @if (! $showForm)
            <button
                wire:click="toggleForm"
                class="text-sm font-medium text-light-text-medium hover:text-indigo-primary dark:text-dark-text-medium dark:hover:text-indigo-primary"
            >
                Responder
            </button>
        @else
            <form
                wire:submit="submit"
                class="mt-3 rounded-xl border border-light-outline-light bg-light-elevation-01dp p-4 dark:border-dark-outline-low dark:bg-dark-elevation-01dp"
            >
                <textarea
                    wire:model="content"
                    placeholder="Escreva sua resposta..."
                    rows="3"
                    class="w-full resize-none border-0 bg-transparent px-0 py-0 text-light-text-high placeholder:text-light-text-low focus:outline-none focus:ring-0 dark:text-dark-text-high dark:placeholder:text-dark-text-low"
                ></textarea>

                @error('content')
                    <p class="mt-2 text-sm text-red-primary">{{ $message }}</p>
                @enderror

                <div
                    class="mt-4 flex justify-end gap-2 border-t border-light-outline-light pt-4 dark:border-dark-outline-low"
                >
                    <button
                        type="button"
                        wire:click="toggleForm"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-light-text-medium hover:bg-light-elevation-02dp dark:text-dark-text-medium dark:hover:bg-dark-elevation-02dp"
                    >
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        class="rounded-lg bg-indigo-primary px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 disabled:cursor-not-allowed disabled:opacity-50"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Responder</span>
                        <span wire:loading>Enviando...</span>
                    </button>
                </div>
            </form>
        @endif
    @endif
</div>
<?php 
