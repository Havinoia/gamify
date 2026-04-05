@extends('layouts.app')

@section('header', 'Quizzes')

@section('content')
<div class="max-w-4xl mx-auto space-y-12 animate-in fade-in slide-in-from-bottom-8 duration-700 font-mono">
    <div class="pixel-card border-[6px] border-pixel-matrix bg-[#1a1f2e] p-12 text-center relative overflow-hidden shadow-[16px_16px_0_0_#000]">
        <!-- 90s Background Pattern (Dark) -->
        <div class="absolute inset-0 opacity-[0.05]" style="background-image: radial-gradient(#39ff14 2px, transparent 2px); background-size: 24px 24px;"></div>
        
        <div class="relative z-10">
            <div class="inline-block bg-pixel-yellow border-[4px] border-black px-6 py-2 mb-8 shadow-[4px_4px_0_0_#000]">
                <h2 class="text-2xl font-heading text-black italic underline font-black">CHALLENGE_ZONE</h2>
            </div>
            
            <p class="text-white max-w-xl mx-auto mb-12 text-sm leading-relaxed uppercase font-bold text-center">ENGAGE IN INTELLECTUAL COMBAT. SOLVE DATA PACKS TO EARN XP AND ASCEND THROUGH THE GLOBAL OPERATIVE HIERARCHY.</p>
            
            <div class="max-w-xl mx-auto">
                <livewire:quiz-component />
            </div>
            
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="pixel-card p-4 border-[4px] border-pixel-blue bg-[#070b13] shadow-[6px_6px_0_0_#000]">
                    <p class="text-[8px] text-pixel-blue font-heading mb-1 underline uppercase italic">ATTEMPTS_LOG</p>
                    <p class="text-xl font-mono text-white font-black">128</p>
                </div>
                <div class="pixel-card p-4 border-[4px] border-pixel-blue bg-[#070b13] shadow-[6px_6px_0_0_#000]">
                    <p class="text-[8px] text-pixel-blue font-heading mb-1 underline uppercase italic">ACCURACY_RATE</p>
                    <p class="text-xl font-mono text-white font-black">85%</p>
                </div>
                <div class="pixel-card p-4 border-[4px] border-pixel-pink bg-[#070b13] shadow-[6px_6px_0_0_#ff00ff]">
                    <p class="text-[8px] text-pixel-pink font-heading mb-1 underline font-black uppercase italic">WIN_STREAK</p>
                    <p class="text-xl font-mono text-pixel-pink font-black italic underline decoration-pixel-pink decoration-2">5_WIN 🔥</p>
                </div>
                <div class="pixel-card p-4 border-[4px] border-pixel-matrix bg-[#070b13] shadow-[6px_6px_0_0_#39ff14]">
                    <p class="text-[8px] text-pixel-matrix font-heading mb-1 underline font-black uppercase italic">XP_YIELD_VAL</p>
                    <p class="text-xl font-mono text-pixel-matrix font-black italic underline decoration-pixel-matrix decoration-2">1,250</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
