<nav class="fixed top-0 left-0 right-0 z-50 bg-light-elevation-01dp dark:bg-dark-elevation-01dp border-b border-light-outline-light dark:border-dark-outline-low h-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="flex justify-between items-center w-full h-full">

            <!-- Botão Toggle Sidebar -->
            <div class="flex items-center gap-4 h-full">
                <button @click="$dispatch('toggle-sidebar')"
                        class="lg:hidden p-2 rounded-lg hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp">
                    <x-heroicon-o-bars-3 class="w-6 h-6 text-light-icon-high dark:text-dark-icon-high"/>
                </button>
            </div>

            <!-- Ações -->
            <div class="flex items-center gap-4 h-full">
                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()"
                        class="p-2 rounded-lg hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp"
                        aria-label="Toggle dark mode">
                    <x-heroicon-o-sun class="w-6 h-6 hidden dark:block text-light-icon-high dark:text-dark-icon-high"/>
                    <x-heroicon-o-moon class="w-6 h-6 dark:hidden text-light-icon-high dark:text-dark-icon-high"/>
                </button>

                @auth
                    <!-- User Menu -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2">
                            @if(auth()->user()->avatar)
                                <img src="{{ auth()->user()->avatar }}" class="w-8 h-8 rounded-full" alt="Avatar">
                            @else
                                <div class="w-8 h-8 rounded-full bg-brand-primary flex items-center justify-center text-white font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                        </button>

                        <div x-show="open"
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-light-elevation-01dp dark:bg-dark-elevation-01dp rounded-lg shadow-lg border border-light-outline-light dark:border-dark-outline-low"
                             style="display: none;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 hover:bg-light-elevation-02dp dark:hover:bg-dark-elevation-02dp text-light-text-high dark:text-dark-text-high rounded-lg">
                                    Sair
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login"
                       class="px-4 py-2 text-light-text-medium dark:text-dark-text-medium hover:text-light-text-high dark:hover:text-dark-text-high">
                        Entrar
                    </a>
                    <a href="/register"
                       class="px-4 py-2 bg-brand-primary text-white rounded-lg hover:bg-brand-500 font-semibold">
                        Registrar
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>

<script>
    function toggleDarkMode() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    }
</script>
