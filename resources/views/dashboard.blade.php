@extends('layouts.app')

@section('header', 'SYSTEM_DASHBOARD')

@section('content')
<div class="space-y-12 animate-in fade-in duration-500">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Main Progress Column -->
        <div class="lg:col-span-2 space-y-10">
            <!-- User Status Card -->
            <div class="pixel-card border-pixel-matrix bg-black/40">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl text-white mb-2">PLAYER_STATUS</h3>
                        <p class="text-xs text-pixel-matrix font-bold uppercase tracking-widest">{{ auth()->user()->name }} // {{ auth()->user()->tier }} RANK</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[8px] text-slate-500 mb-1">CURRENT_LVL</p>
                        <p class="text-3xl font-mono text-white leading-none">0{{ auth()->user()->level->id ?? '1' }}</p>
                    </div>
                </div>

                <!-- XP Bar -->
                <livewire:level-progress />
            </div>

            <!-- Dashboard Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="pixel-card border-white/20 bg-[#111827] group hover:border-pixel-matrix transition-colors">
                    <p class="text-[8px] text-slate-500 font-heading mb-3">TOTAL_XP</p>
                    <p class="text-3xl font-mono text-white tracking-tighter">{{ number_format($user->total_points) }}</p>
                    <p class="text-[8px] text-pixel-matrix mt-2 uppercase font-bold">Accumulated</p>
                </div>
                <div class="pixel-card border-white/20 bg-[#111827] group hover:border-pixel-pink transition-colors">
                    <p class="text-[8px] text-slate-500 font-heading mb-3">INVENTORY</p>
                    <p class="text-3xl font-mono text-white tracking-tighter">{{ count($userBadges) }}</p>
                    <p class="text-[8px] text-pixel-pink mt-2 uppercase font-bold">Badges Earned</p>
                </div>
                <div class="pixel-card border-white/20 bg-[#111827] group hover:border-pixel-blue transition-colors">
                    <p class="text-[8px] text-slate-500 font-heading mb-3">GLOBAL_RANK</p>
                    <p class="text-3xl font-mono text-white tracking-tighter">#01</p>
                    <p class="text-[8px] text-pixel-blue mt-2 uppercase font-bold">Top Tier</p>
                </div>
            </div>

            <!-- Recent Achievements -->
            <div class="pixel-card border-white/10 bg-black/20">
                <h3 class="text-sm text-white mb-8 border-b-2 border-white/10 pb-4 inline-block">RECENT_ACHIEVEMENTS</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($badges as $badge)
                        <div class="pixel-card p-4 border-2 {{ in_array($badge->id, $userBadges) ? 'border-pixel-matrix bg-pixel-matrix/5 shadow-[4px_4px_0px_0px_#008f11]' : 'border-white/10 opacity-30 grayscale' }}">
                            <div class="text-center">
                                <span class="text-3xl mb-2 block">{{ in_array($badge->id, $userBadges) ? '🏅' : '🔒' }}</span>
                                <p class="text-[8px] font-heading text-white line-clamp-1">{{ strtoupper($badge->name) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar Activity Column -->
        <div class="space-y-10">
            <!-- Quiz Card -->
            <div class="pixel-card border-pixel-blue bg-black/40">
                <h3 class="text-xs text-pixel-blue mb-6">>> ACTIVE_MISSION</h3>
                <livewire:quiz-component />
            </div>

            <!-- Rankings Preview -->
            <div class="pixel-card border-white/10 bg-transparent">
                <h3 class="text-[10px] text-white mb-6 underline">GLOBAL_STANDINGS</h3>
                <div class="space-y-4">
                    <livewire:leaderboard />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
