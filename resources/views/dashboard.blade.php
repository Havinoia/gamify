@extends('layouts.app')

@section('header', 'SYSTEM_DASHBOARD')

@section('content')
<div class="space-y-12 animate-in fade-in slide-in-from-bottom-8 duration-700">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Main Progress Column -->
        <div class="lg:col-span-2 space-y-12">
            <!-- User Status Card (Dark 90s Style) -->
            <div class="pixel-card-primary !bg-[#1a1f2e]">
                <div class="flex items-center justify-between mb-8 border-b-[4px] border-black pb-4 bg-pixel-matrix -mx-6 -mt-6 p-6 shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">
                    <div>
                        <h3 class="text-xl text-black mb-1 drop-shadow-[2px_2px_0px_#fff]">PLAYER_STATUS</h3>
                        <p class="text-[10px] text-black font-bold uppercase tracking-widest">{{ auth()->user()->name }} // {{ auth()->user()->tier }} RANK</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[8px] text-black font-heading mb-1 underline">LVL</p>
                        <p class="text-4xl font-mono text-black leading-none font-black italic">0{{ auth()->user()->level->id ?? '1' }}</p>
                    </div>
                </div>

                <!-- XP Bar -->
                <div class="mt-8">
                    <livewire:level-progress />
                </div>
            </div>

            <!-- Dashboard Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="pixel-card border-pixel-blue bg-[#1a1f2e] group hover:-translate-y-2 transition-all shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
                    <p class="text-[8px] text-pixel-blue font-heading mb-3 underline uppercase">TOTAL_XP_ACCUMULATED</p>
                    <p class="text-3xl font-mono text-white tracking-tighter font-black">{{ number_format($user->total_points) }}</p>
                    <p class="text-[8px] text-pixel-matrix mt-2 uppercase font-bold italic">:: SYNC_COMPLETE</p>
                </div>
                <div class="pixel-card border-pixel-pink bg-[#1a1f2e] group hover:-translate-y-2 transition-all shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
                    <p class="text-[8px] text-pixel-pink font-heading mb-3 underline uppercase">INVENTORY_BADGES</p>
                    <p class="text-3xl font-mono text-white tracking-tighter font-black">{{ count($userBadges) }}</p>
                    <p class="text-[8px] text-pixel-blue mt-2 uppercase font-bold italic">:: DATA_LOCKED</p>
                </div>
                <div class="pixel-card border-pixel-yellow bg-[#1a1f2e] group hover:-translate-y-2 transition-all shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
                    <p class="text-[8px] text-pixel-yellow font-heading mb-3 underline uppercase">GLOBAL_RANK_ID</p>
                    <p class="text-3xl font-mono text-white tracking-tighter font-black">#01</p>
                    <p class="text-[8px] text-black bg-pixel-yellow px-1 mt-2 uppercase font-bold italic">Top Operative</p>
                </div>
            </div>

            <!-- Recent Achievements -->
            <div class="pixel-card border-pixel-matrix/30 bg-black/20">
                <h3 class="text-sm text-pixel-matrix mb-8 border-b-[4px] border-pixel-matrix/10 pb-4 inline-block italic uppercase underline tracking-widest">RECENT_DATA_LOGS</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($badges as $badge)
                        <div class="pixel-card p-4 border-[3px] {{ in_array($badge->id, $userBadges) ? 'border-pixel-matrix bg-pixel-matrix/10 shadow-[4px_4px_0px_0px_rgba(0,0,0,0.5)]' : 'border-pixel-matrix/10 opacity-30 grayscale' }}">
                            <div class="text-center">
                                <span class="text-3xl mb-2 block drop-shadow-[2px_2px_0px_rgba(0,0,0,0.5)]">{{ in_array($badge->id, $userBadges) ? '🏆' : '🔒' }}</span>
                                <p class="text-[8px] font-heading text-white line-clamp-1 truncate uppercase">{{ strtoupper($badge->name) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar Activity Column -->
        <div class="space-y-10">
            <!-- Rankings Preview -->
            <div class="pixel-card border-pixel-blue bg-[#111827]">
                <h3 class="text-[10px] text-black mb-6 underline font-black bg-pixel-blue -mx-6 -mt-6 p-4 border-b-[4px] border-black italic">TOP_OPERATIVES_FEED</h3>
                <div class="space-y-4">
                    <livewire:leaderboard />
                </div>
            </div>
            
            <!-- System Message -->
            <div class="pixel-card border-[4px] border-pixel-yellow bg-pixel-yellow p-4 shadow-[8px_8px_0px_0px_#000]">
                <p class="text-[8px] font-heading text-black mb-2 animate-pulse">>>> SYSTEM_MSG</p>
                <p class="text-xs text-black leading-relaxed font-bold">WELCOME BACK, OPERATIVE. ALL SYSTEMS ONLINE. DATA SYNC COMPLETE.</p>
            </div>
        </div>
    </div>
</div>
@endsection
