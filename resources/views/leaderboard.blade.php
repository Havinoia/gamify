@extends('layouts.app')

@section('header', 'STATUS_GLOBAL_RANKINGS')

@section('content')
<div class="space-y-12 animate-in fade-in duration-500 font-mono">
    <!-- Top 3 Podium (Dark 90s Style) -->
    <div class="flex flex-col md:flex-row items-end justify-center gap-0 max-w-5xl mx-auto py-12 pt-24">
        @if(count($topUsers) >= 2)
        <div class="w-full md:w-64 order-2 md:order-1">
            <div class="h-40 bg-[#1a1f2e] border-[6px] border-pixel-blue relative flex flex-col items-center justify-end p-4 shadow-[12px_12px_0_0_#000]">
                <div class="absolute -top-20 text-5xl drop-shadow-[4px_4px_0_#00ffff]">🥈</div>
                <h4 class="font-heading text-[10px] text-white mb-2 truncate w-full text-center">{{ $topUsers[1]->name }}</h4>
                <p class="font-heading text-[8px] text-black bg-pixel-blue px-2 mb-4 italic">{{ number_format($topUsers[1]->total_points) }} XP</p>
                <div class="w-full h-10 bg-pixel-blue border-t-[6px] border-pixel-blue flex items-center justify-center font-heading text-black text-xs font-black italic shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">2ND_PLACE</div>
            </div>
        </div>
        @endif

        @if(count($topUsers) >= 1)
        <div class="w-full md:w-72 order-1 md:order-2 z-10">
            <div class="h-64 bg-[#1a1f2e] border-[8px] border-pixel-matrix relative flex flex-col items-center justify-end p-6 shadow-[20px_20px_0_0_#39ff14]">
                <div class="absolute -top-28 text-8xl animate-bounce drop-shadow-[8px_8px_0_#39ff14]">👑</div>
                <h3 class="font-heading text-xs text-white mb-2 truncate w-full text-center font-black underline decoration-pixel-matrix leading-none">{{ $topUsers[0]->name }}</h3>
                <p class="font-heading text-[12px] text-black bg-pixel-matrix px-3 mb-6 font-black italic border-2 border-pixel-matrix shadow-[2px_2px_0_0_rgba(0,0,0,0.3)]">{{ number_format($topUsers[0]->total_points) }} XP</p>
                <div class="w-full h-14 bg-pixel-matrix border-t-[8px] border-pixel-matrix flex items-center justify-center font-heading text-black text-sm font-black italic shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">TOP_OPERATIVE</div>
            </div>
        </div>
        @endif

        @if(count($topUsers) >= 3)
        <div class="w-full md:w-64 order-3">
            <div class="h-32 bg-[#1a1f2e] border-[6px] border-pixel-pink relative flex flex-col items-center justify-end p-4 shadow-[12px_12px_0_0_#000]">
                <div class="absolute -top-16 text-5xl drop-shadow-[4px_4px_0_#ff00ff]">🥉</div>
                <h4 class="font-heading text-[10px] text-white mb-2 truncate w-full text-center">{{ $topUsers[2]->name }}</h4>
                <p class="font-heading text-white bg-pixel-pink px-2 mb-4 italic">{{ number_format($topUsers[2]->total_points) }} XP</p>
                <div class="w-full h-10 bg-pixel-pink border-t-[6px] border-pixel-pink flex items-center justify-center font-heading text-black text-xs font-black italic shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">3RD_PLACE</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Full Rankings Table (Dark Mode High Contrast) -->
    <div class="pixel-card border-pixel-matrix bg-[#1a1f2e] !p-0 overflow-hidden shadow-[12px_12px_0_0_#000]">
        <div class="p-8 border-b-[6px] border-pixel-matrix flex justify-between items-center bg-[#070b13]">
            <h3 class="text-xs text-pixel-matrix font-black uppercase italic tracking-widest">>> GLOBAL_OPERATIVE_REGISTRY</h3>
            <span class="text-[8px] font-heading text-pixel-matrix animate-pulse border-2 border-pixel-matrix px-2 bg-black/40">LIVE_UPDATING...</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="text-[10px] font-heading text-slate-400 border-b-[4px] border-pixel-matrix/30 bg-black/20">
                    <tr>
                        <th class="px-8 py-6 w-32 border-r-[4px] border-pixel-matrix/10">RANK</th>
                        <th class="px-8 py-6 border-r-[4px] border-pixel-matrix/10">OPERATIVE_ID</th>
                        <th class="px-8 py-6 border-r-[4px] border-pixel-matrix/10">TIER_RECOGNITION</th>
                        <th class="px-8 py-6 text-right bg-pixel-matrix/5">TOTAL_XP_YLD_UNITS</th>
                    </tr>
                </thead>
                <tbody class="divide-y-[4px] divide-pixel-matrix/5">
                    @foreach($topUsers as $index => $leader)
                    <tr class="hover:bg-pixel-matrix/5 transition-all group">
                        <td class="px-8 py-6 border-r-[4px] border-pixel-matrix/10">
                            <span class="font-heading text-[12px] {{ $index < 3 ? 'text-pixel-pink' : 'text-slate-500' }} font-black">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td class="px-8 py-6 border-r-[4px] border-pixel-matrix/10">
                            <div class="flex items-center">
                                <div class="w-12 h-12 border-[3px] border-pixel-matrix bg-black/40 flex items-center justify-center font-heading text-[12px] text-white group-hover:bg-pixel-matrix group-hover:text-black transition-colors shadow-[4px_4px_0px_0px_#000]">
                                    {{ substr($leader->name, 0, 1) }}
                                </div>
                                <div class="ml-6">
                                    <p class="font-heading text-[10px] text-white transition-colors uppercase leading-none mb-1 font-black underline">{{ $leader->name }}</p>
                                    <p class="text-[8px] text-slate-500 font-mono tracking-widest italic font-bold">REG_ID: 199{{ rand(0,9) }}_{{ str_pad($leader->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 border-r-[4px] border-pixel-matrix/10">
                            <div class="flex flex-col">
                                <span class="font-heading text-[8px] text-pixel-blue mb-2 uppercase underline decoration-pixel-blue decoration-2 tracking-widest">{{ $leader->tier ?? 'NOVICE' }}</span>
                                <div class="w-40 h-5 bg-black/40 border-[3px] border-pixel-matrix/20 p-0.5 shadow-[2px_2px_0px_0px_#000]">
                                    <div class="h-full bg-pixel-matrix border-r-[2px] border-black shadow-[0_0_10px_#39ff14]" style="width: {{ (($leader->total_points % 1000) / 1000) * 100 }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right bg-pixel-matrix/5">
                            <p class="text-2xl font-mono text-white font-black leading-none mb-1 italic underline">{{ number_format($leader->total_points) }}</p>
                            <p class="text-[8px] font-heading text-pixel-matrix opacity-50 font-black">XP_QUANTUM</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-8 border-t-[6px] border-pixel-matrix/10 bg-black/40 font-mono">
            {{ $topUsers->links() }}
        </div>
    </div>
</div>
@endsection
