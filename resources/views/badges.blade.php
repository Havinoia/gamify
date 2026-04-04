@extends('layouts.app')

@section('header', 'STATUS_INVENTORY_MANAGER')

@section('content')
<div class="space-y-12 animate-in fade-in duration-700 font-mono">
    <div class="pixel-card-primary p-8 relative overflow-hidden bg-black/40">
        <div class="absolute top-0 right-0 p-8 opacity-20 animate-float pointer-events-none">
            <span class="text-8xl">📦</span>
        </div>
        <div class="relative z-10">
            <h3 class="text-xl font-heading text-white mb-4 underline">MISSION_REWARDS</h3>
            <p class="text-xs text-slate-400 leading-relaxed uppercase">
                YOU HAVE COLLECTED <span class="text-pixel-matrix font-bold">{{ count($userBadges) }}</span> / <span class="text-white font-bold">{{ count($badges) }}</span> SYSTEM_BADGES.
                KEEP COMPLETING MISSIONS TO UNLOCK ULTIMATE TIER ITEMS.
            </p>
        </div>
    </div>

    <!-- Inventory Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
        @foreach($badges as $badge)
            @php $isEarned = in_array($badge->id, array_keys($userBadges)) || isset($userBadges[$badge->name]); @endphp
            <div class="pixel-card p-6 text-center group transition-all duration-300 {{ $isEarned ? 'border-pixel-matrix bg-pixel-matrix/5 shadow-[6px_6px_0px_0px_#008f11]' : 'opacity-20 grayscale pointer-events-none border-white/10 shadow-none' }}">
                <div class="w-16 h-16 mx-auto mb-6 bg-black/40 border-2 border-white/20 flex items-center justify-center text-3xl group-hover:scale-110 group-hover:border-pixel-matrix transition-all">
                    {{ $isEarned ? '🏅' : '🔒' }}
                </div>
                
                <h5 class="font-heading text-[8px] text-white line-clamp-1 mb-2">{{ strtoupper($badge->name) }}</h5>
                <p class="text-[8px] font-mono text-pixel-matrix mb-4 tracking-tighter">{{ $badge->points_required }} PTS</p>
                
                <div class="flex justify-center">
                    @if($isEarned)
                        <span class="px-3 py-1 border-2 border-pixel-matrix text-pixel-matrix text-[8px] font-heading uppercase">EQUIPPED</span>
                    @else
                        <span class="px-3 py-1 border-2 border-white/20 text-slate-500 text-[8px] font-heading uppercase tracking-tighter">LOCKED</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Footer Logs -->
    <div class="pixel-card bg-black/20 border-white/10">
        <h4 class="text-[8px] font-heading text-slate-500 mb-4 tracking-widest underline">SYSTEM_LOGS</h4>
        <div class="space-y-2">
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] SCANNING_DATABASE... DONE</p>
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] REWARDS_SYNC_COMPLETE</p>
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] STANDBY_FOR_NEXT_SYNC...</p>
        </div>
    </div>
</div>
@endsection
