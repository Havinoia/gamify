@extends('layouts.app')

@section('header', 'STATUS_GLOBAL_RANKINGS')

@section('content')
<div class="space-y-12 animate-in fade-in duration-500 font-mono">
    <!-- Top 3 Podium (Retro Style) -->
    <div class="flex flex-col md:flex-row items-end justify-center gap-0 max-w-5xl mx-auto py-12 pt-20">
        @if(count($topUsers) >= 2)
        <div class="w-full md:w-64 order-2 md:order-1">
            <div class="h-40 bg-[#111827] border-4 border-slate-400 relative flex flex-col items-center justify-end p-4 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
                <div class="absolute -top-16 text-4xl">🥈</div>
                <h4 class="font-heading text-[10px] text-white mb-2 truncate w-full text-center">{{ $topUsers[1]->name }}</h4>
                <p class="font-heading text-[8px] text-slate-400 mb-4">{{ number_format($topUsers[1]->total_points) }} XP</p>
                <div class="w-full h-8 bg-slate-400 flex items-center justify-center font-heading text-black text-xs">2ND</div>
            </div>
        </div>
        @endif

        @if(count($topUsers) >= 1)
        <div class="w-full md:w-72 order-1 md:order-2 z-10">
            <div class="h-56 bg-[#1a1f2e] border-4 border-pixel-matrix relative flex flex-col items-center justify-end p-6 shadow-[12px_12px_0px_0px_rgba(0,255,65,0.2)]">
                <div class="absolute -top-20 text-6xl animate-bounce">👑</div>
                <h3 class="font-heading text-xs text-white mb-2 truncate w-full text-center">{{ $topUsers[0]->name }}</h3>
                <p class="font-heading text-[10px] text-pixel-matrix mb-6">{{ number_format($topUsers[0]->total_points) }} XP</p>
                <div class="w-full h-12 bg-pixel-matrix flex items-center justify-center font-heading text-black text-sm">1ST_PLACE</div>
            </div>
        </div>
        @endif

        @if(count($topUsers) >= 3)
        <div class="w-full md:w-64 order-3">
            <div class="h-32 bg-[#0f172a] border-4 border-orange-600 relative flex flex-col items-center justify-end p-4 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
                <div class="absolute -top-14 text-4xl">🥉</div>
                <h4 class="font-heading text-[10px] text-white mb-2 truncate w-full text-center">{{ $topUsers[2]->name }}</h4>
                <p class="font-heading text-[8px] text-orange-500 mb-4">{{ number_format($topUsers[2]->total_points) }} XP</p>
                <div class="w-full h-8 bg-orange-600 flex items-center justify-center font-heading text-black text-xs">3RD</div>
            </div>
        </div>
        @endif
    </div>

    <!-- Full Rankings Table -->
    <div class="pixel-card border-white/20 bg-black/40">
        <div class="p-6 border-b-4 border-white/10 flex justify-between items-center bg-white/5">
            <h3 class="text-xs text-white">>> TOP_OPERATIVES</h3>
            <span class="text-[8px] font-heading text-pixel-matrix animate-pulse">LIVE_FEED_ACTIVE</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="text-[8px] font-heading text-slate-500 border-b-4 border-white/10">
                    <tr>
                        <th class="px-8 py-6 w-24">RANK</th>
                        <th class="px-8 py-6">OPERATIVE_NAME</th>
                        <th class="px-8 py-6">SYSTEM_TIER</th>
                        <th class="px-8 py-6 text-right">TOTAL_XP</th>
                    </tr>
                </thead>
                <tbody class="divide-y-4 divide-white/5">
                    @foreach($topUsers as $index => $leader)
                    <tr class="hover:bg-pixel-matrix/5 transition-all group">
                        <td class="px-8 py-6">
                            <span class="font-heading text-xs {{ $index < 3 ? 'text-pixel-matrix' : 'text-slate-600' }}">#0{{ $index + 1 }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center">
                                <div class="w-10 h-10 border-2 border-white bg-black/50 flex items-center justify-center font-heading text-[10px] text-white group-hover:border-pixel-matrix transition-colors">
                                    {{ substr($leader->name, 0, 1) }}
                                </div>
                                <div class="ml-4">
                                    <p class="font-heading text-[10px] text-white group-hover:text-pixel-matrix transition-colors uppercase leading-none mb-1">{{ $leader->name }}</p>
                                    <p class="text-[8px] text-slate-500 font-mono tracking-widest">ACTIVE_SINCE_{{ $leader->created_at->format('Y.m') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="font-heading text-[8px] {{ $leader->tier_color }} mb-1">{{ $leader->tier }}</span>
                                <div class="w-32 h-4 bg-black border-2 border-white/20 p-0.5">
                                    <div class="h-full bg-pixel-matrix" style="width: {{ ($leader->level->id % 10) * 10 }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <p class="text-xl font-mono text-white tracking-widest leading-none mb-1">{{ number_format($leader->total_points) }}</p>
                            <p class="text-[8px] font-heading text-pixel-matrix uppercase opacity-50">Points</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="p-6 border-t-4 border-white/10 bg-black/20 font-mono">
            {{ $topUsers->links() }}
        </div>
    </div>
</div>
@endsection
