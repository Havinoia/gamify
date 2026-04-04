@extends('layouts.app')

@section('header', 'Quizzes')

@section('content')
<div class="max-w-4xl mx-auto space-y-8 animate-in fade-in zoom-in-95 duration-500">
    <div class="glass-card p-12 text-center relative overflow-hidden">
        <div class="absolute -top-12 -left-12 p-32 opacity-10 bg-indigo-500 blur-[100px] rounded-full"></div>
        <div class="absolute -bottom-12 -right-12 p-32 opacity-10 bg-pink-500 blur-[100px] rounded-full"></div>
        
        <div class="relative z-10">
            <h2 class="text-4xl font-black mb-4">Daily Challenge Mode</h2>
            <p class="text-slate-400 max-w-lg mx-auto mb-8 text-lg">Test your knowledge with random questions from various topics. Earn points to level up and unlock exclusive tiers.</p>
            
            <div class="max-w-xl mx-auto">
                <livewire:quiz-component />
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="glass-card p-4 bg-white/5 border-white/10">
                    <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Total Attempted</p>
                    <p class="text-xl font-bold">128</p>
                </div>
                <div class="glass-card p-4 bg-white/5 border-white/10">
                    <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Avg Score</p>
                    <p class="text-xl font-bold">85%</p>
                </div>
                <div class="glass-card p-4 bg-white/5 border-white/10">
                    <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Win Streak</p>
                    <p class="text-xl font-bold">5 🔥</p>
                </div>
                <div class="glass-card p-4 bg-white/5 border-white/10">
                    <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Points Earned</p>
                    <p class="text-xl font-bold">1,250</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
