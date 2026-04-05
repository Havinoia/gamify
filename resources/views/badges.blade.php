@extends('layouts.app')

@section('header', 'STATUS_INVENTORY_MANAGER')

@section('content')
<div class="space-y-12 animate-in fade-in duration-500 font-mono">
    <div class="flex items-center justify-between border-b-[6px] border-pixel-matrix pb-6 bg-pixel-matrix -mx-10 -mt-10 px-10 p-8 shadow-[0_6px_0_0_#000]">
        <div>
            <h2 class="text-2xl font-heading text-black italic underline font-black">OPERATIVE_INVENTORY</h2>
            <p class="text-[10px] text-black font-bold uppercase mt-2">TOTAL_COLLECTABLES_SYNCED: {{ count($userBadges) }} / {{ count($badges) }}</p>
        </div>
        <div class="bg-pixel-blue border-[4px] border-black p-4 shadow-[4px_4px_0_0_#000]">
            <span class="text-[8px] font-heading text-black block mb-1 underline">COMPLETION_RATE</span>
            <span class="text-xl font-mono text-black font-black">{{ round((count($userBadges) / max(1, count($badges))) * 100) }}%</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($badges as $badge)
            @php $isOwned = in_array($badge->id, $userBadges); @endphp
            <div class="pixel-card border-[4px] {{ $isOwned ? 'border-pixel-matrix bg-[#1a1f2e] shadow-[10px_10px_0_0_rgba(0,0,0,0.5)]' : 'border-pixel-matrix/10 bg-pixel-matrix/5 opacity-40 grayscale shadow-none' }} group transition-all relative overflow-hidden">
                @if($isOwned)
                    <div class="absolute top-0 right-0 bg-pixel-matrix border-b-[4px] border-l-[4px] border-pixel-matrix px-2 py-1 text-[8px] font-heading text-black font-black">
                        OWNED
                    </div>
                @endif

                <div class="text-center py-6">
                    <div class="w-20 h-20 mx-auto bg-black/40 border-[4px] {{ $isOwned ? 'border-pixel-matrix shadow-[0_0_15px_rgba(57,255,20,0.3)]' : 'border-pixel-matrix/20' }} flex items-center justify-center text-4xl mb-6 shadow-[4px_4px_0_0_#000] transition-transform group-hover:scale-110">
                        {{ $isOwned ? '🏅' : '🔒' }}
                    </div>
                    <h3 class="text-xs font-heading {{ $isOwned ? 'text-white' : 'text-slate-500' }} mb-2 underline decoration-pixel-blue decoration-2 uppercase">{{ strtoupper($badge->name) }}</h3>
                    <p class="text-[10px] text-slate-400 font-mono italic leading-tight uppercase">{{ $badge->description }}</p>
                </div>

                @if($isOwned)
                    <div class="mt-4 pt-4 border-t-[3px] border-dashed border-pixel-matrix/20 text-center">
                        <span class="text-[8px] font-heading text-pixel-blue font-black uppercase tracking-widest italic">Data_Verified_199{{ rand(0,9) }}</span>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <!-- Footer Logs -->
    <div class="pixel-card bg-black/20 border-pixel-matrix/20">
        <h4 class="text-[8px] font-heading text-slate-500 mb-4 tracking-widest underline">SYSTEM_LOGS</h4>
        <div class="space-y-2">
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] SCANNING_DATABASE... DONE</p>
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] REWARDS_SYNC_COMPLETE</p>
            <p class="text-[10px] text-pixel-matrix/60 font-mono">>> [{{ now()->format('H:i:s') }}] STANDBY_FOR_NEXT_SYNC...</p>
        </div>
    </div>
</div>
@endsection
