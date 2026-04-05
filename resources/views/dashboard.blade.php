@extends('layouts.app')

@section('header', 'SYSTEM_DASHBOARD')

@section('content')
<div class="space-y-12 animate-in fade-in slide-in-from-bottom-8 duration-700">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Main Progress Column -->
        <div class="lg:col-span-2 space-y-12">
            <!-- User Status Card (Neon Matrix Mode) -->
            <div class="pixel-card-primary p-6">
                <div class="pixel-card-header-matrix !bg-black/90 !border-b-0 shadow-[0_4px_0_0_#000]">
                    <div>
                        <h3 class="text-xl text-pixel-matrix mb-1 drop-shadow-[2px_2px_0px_rgba(0,0,0,0.5)]">PLAYER_STATUS</h3>
                        <p class="text-[10px] text-white/70 font-bold uppercase tracking-widest">{{ auth()->user()->name }} // {{ strtoupper(auth()->user()->level?->name ?? 'NOVICE') }} RANK</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[8px] text-pixel-matrix font-heading mb-1 underline">LVL</p>
                        <p class="text-4xl font-mono text-white leading-none font-black italic">0{{ auth()->user()->level?->id ?? '1' }}</p>
                    </div>
                </div>

                <!-- XP Bar -->
                <div class="mt-8">
                    <livewire:level-progress />
                </div>
            </div>

            <!-- Dashboard Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="pixel-card border-pixel-blue group hover:-translate-y-2 transition-all flex flex-col justify-between h-full min-h-[160px]">
                    <div>
                        <p class="text-[8px] text-pixel-blue font-heading mb-3 underline uppercase">TOTAL_XP_YLD_UNITS</p>
                        <p class="text-4xl font-mono text-white tracking-tighter font-black leading-none">{{ number_format($user->total_points) }}</p>
                    </div>
                    
                    <div class="mt-auto pt-6 border-t-[2px] border-white/5">
                        <p class="text-[7px] text-slate-500 font-heading mb-2 uppercase italic">TIER_RECOGNITION</p>
                        <div class="flex items-center justify-between">
                            <p class="text-[11px] font-heading text-pixel-matrix tracking-widest font-black uppercase">{{ auth()->user()->level?->name ?? 'NOVICE' }}</p>
                            <span class="w-2 h-2 bg-pixel-matrix animate-pulse shadow-[0_0_8px_#4ADE80]"></span>
                        </div>
                    </div>
                </div>
                <div class="pixel-card border-pixel-pink group hover:-translate-y-2 transition-all">
                    <p class="text-[8px] text-pixel-pink font-heading mb-3 underline uppercase">INVENTORY_BADGES</p>
                    <p class="text-3xl font-mono text-white tracking-tighter font-black">{{ count($userBadges) }}</p>
                    <p class="text-[8px] text-pixel-blue mt-2 uppercase font-bold italic">:: DATA_LOCKED</p>
                </div>
                <div class="pixel-card border-pixel-yellow group hover:-translate-y-2 transition-all">
                    <p class="text-[8px] text-pixel-yellow font-heading mb-3 underline uppercase">GLOBAL_RANK_ID</p>
                    <p class="text-3xl font-mono text-white tracking-tighter font-black">#01</p>
                    <p class="text-[8px] text-black bg-pixel-yellow px-1 mt-2 uppercase font-bold italic">Top Operative</p>
                </div>
            </div>

            <!-- Recent Achievements -->
            <div class="pixel-card border-pixel-matrix/30 bg-black/20">
                <h3 class="pixel-title-light mb-8 border-b-[4px] border-pixel-matrix/10 pb-4 inline-block shadow-pixel-matrix/20">RECENT_DATA_LOGS</h3>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($badges as $badge)
                        <div class="pixel-card p-4 border-[3px] {{ in_array($badge->id, $userBadges) ? 'border-pixel-matrix bg-pixel-matrix/10 shadow-[4px_4px_0px_0px_#000]' : 'border-pixel-matrix/10 opacity-30 grayscale' }}">
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
            <!-- Start Mission Card (Direct Link) -->
            <div class="pixel-card border-pixel-blue group relative overflow-hidden">
                <div class="pixel-card-header-blue">
                    <h3 class="pixel-title-dark">:: ACTIVE_MISSIONS</h3>
                    <span class="w-3 h-3 bg-black animate-ping"></span>
                </div>
                
                <div class="absolute -right-4 top-16 w-24 h-24 bg-pixel-blue/10 rotate-12 group-hover:rotate-45 transition-transform duration-700"></div>
                
                <p class="text-xs text-white/70 mb-8 leading-relaxed font-mono">NEW_DATA_IDENTIFIED. INITIATE PROTOCOL TO EARN XP AND UNLOCK SYSTEM REWARDS.</p>
                
                <a href="{{ route('quizzes') }}" class="pixel-btn-matrix w-full py-4 text-[12px] text-center block font-black transition-all">
                    START_MISSION >>
                </a>
            </div>

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
