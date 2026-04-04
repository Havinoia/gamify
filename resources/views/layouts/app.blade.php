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
    <body class="antialiased overflow-x-hidden font-mono bg-pixel-bg">
        <!-- Scanlines -->
        <div class="fixed inset-0 z-[9999] pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px] opacity-20"></div>

        <div class="flex min-h-screen border-[8px] border-black">
            <!-- Sidebar -->
            <aside class="w-64 border-r-[4px] border-white/20 bg-[#111827] sticky top-0 h-screen hidden md:block">
                <div class="p-8 border-b-[4px] border-white/10">
                    <h1 class="text-xs font-heading text-pixel-matrix leading-relaxed">GAMIFY<br>SYSTEM v1.0</h1>
                </div>
                
                <nav class="mt-8 px-2 space-y-2">
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
                </nav>

                <div class="absolute bottom-0 w-full p-6 border-t-[4px] border-white/10 bg-black/30">
                    <div class="flex items-center">
                        <div class="w-12 h-12 border-[2px] border-white bg-pixel-matrix flex items-center justify-center font-heading text-[10px] text-black shadow-[4px_4px_0px_0px_rgba(0,255,65,0.3)]">
                            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <p class="text-[10px] font-heading line-clamp-1 text-white uppercase">{{ auth()->user()->name ?? 'Guest' }}</p>
                            <p class="text-xs text-pixel-matrix font-bold tracking-tighter uppercase">{{ auth()->user()->level->name ?? 'No Rank' }}</p>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden bg-[#070b13]">
                <!-- Header -->
                <header class="h-20 flex items-center justify-between px-8 border-b-[4px] border-white/10 bg-[#0c1120] sticky top-0 z-10">
                    <h2 class="text-sm font-heading text-white">:: @yield('header', 'STATUS_READY')</h2>
                    
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
