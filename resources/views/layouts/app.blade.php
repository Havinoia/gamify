<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Gamify') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
    </head>
    <body class="antialiased overflow-x-hidden font-mono bg-pixel-bg text-pixel-text">
        <!-- Subtle 90s Scanline (Dark) -->
        <div class="fixed inset-0 z-[9999] pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.2)_50%)] bg-[length:100%_4px] opacity-10"></div>

        <div class="flex min-h-screen border-[8px] border-black">
            <!-- Sidebar (Dark 90s RPG Menu Style) -->
            <aside class="w-64 border-r-[8px] border-black bg-[#111827] sticky top-0 h-screen hidden md:block">
                <div class="p-8 border-b-[8px] border-black bg-pixel-blue shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">
                    <h1 class="text-xs font-heading text-black leading-relaxed">GAMIFY<br>SYSTEM v3.0</h1>
                </div>
                
                <nav class="mt-8 px-2 space-y-4">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="mr-3">>></span> DASHBOARD
                    </a>
                    <a href="{{ route('badges') }}" class="nav-link {{ request()->routeIs('badges') ? 'active' : '' }}">
                        <span class="mr-3">>></span> INVENTORY
                    </a>
                    <a href="{{ route('quizzes') }}" class="nav-link {{ request()->routeIs('quizzes') ? 'active' : '' }}">
                        <span class="mr-3">>></span> MISSION
                    </a>
                    <a href="{{ route('leaderboard') }}" class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}">
                        <span class="mr-3">>></span> RANKINGS
                    </a>

                    <div class="mt-8 pt-8 border-t-[8px] border-black space-y-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link w-full text-left group hover:bg-red-500 hover:text-white transition-all">
                                    <span class="mr-3 text-red-500 group-hover:text-white">!!</span> SIGNOUT_SESSION
                                </button>
                            </form>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }} group hover:bg-pixel-matrix hover:text-black">
                                <span class="mr-3 text-pixel-matrix group-hover:text-black">>></span> LOGIN_OPERATIVE
                            </a>
                            <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }} group hover:bg-pixel-matrix hover:text-black">
                                <span class="mr-3 text-pixel-matrix group-hover:text-black">>></span> REGISTER_NEW
                            </a>
                        @endguest
                    </div>
                </nav>

                @auth
                    <div class="absolute bottom-0 w-full p-6 border-t-[8px] border-black bg-black/40">
                        <div class="flex items-center">
                            <div class="w-12 h-12 border-[4px] border-pixel-matrix bg-pixel-matrix flex items-center justify-center font-heading text-[10px] text-black shadow-[4px_4px_0px_0px_#000]">
                                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <p class="text-[10px] font-heading line-clamp-1 text-white uppercase">{{ auth()->user()->name ?? 'Guest' }}</p>
                                <p class="text-xs text-pixel-matrix font-bold tracking-tighter uppercase underline decoration-white decoration-2">{{ auth()->user()->level->name ?? 'No Rank' }}</p>
                            </div>
                        </div>
                    </div>
                @endauth
            </aside>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden bg-pixel-bg">
                <!-- Mobile Header (90s Arcade Style) -->
                <div class="flex gap-2 items-center justify-between sm:hidden p-4 border-b-[4px] border-black bg-[#0c1120] sticky top-0 z-[6000]">
                    <div class="flex items-center">
                        <span class="text-[8px] font-heading text-black bg-pixel-blue px-2 py-1 shadow-[2px_2px_0px_0px_#000]">GAMIFY_SYS</span>
                    </div>
                    <div class="flex items-center scale-75 origin-right">
                        <livewire:header-stats />
                    </div>
                </div>

                <!-- Header (Dark 90s Arcade) -->
                <header class="h-20 flex items-center justify-between px-8 border-b-[8px] border-black bg-[#0c1120] sticky top-0 z-[5000]">
                    <div class="flex items-center">
                        <span class="text-xs font-heading text-pixel-pink mr-3 animate-pulse">●</span>
                        <h2 class="text-sm font-heading text-white">:: @yield('header', 'STATUS_READY')</h2>
                    </div>
                    
                    <div class="flex items-center">
                        <livewire:header-stats />
                    </div>
                </header>

                <section class="p-10">
                    {{ $slot ?? '' }}
                    @yield('content')
                </section>
            </main>
        </div>

        @livewireScripts
    </body>
</html>
