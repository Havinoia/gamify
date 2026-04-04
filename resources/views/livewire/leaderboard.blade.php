<?php

use Livewire\Volt\Component;
use App\Models\User;
use Livewire\Attributes\On;

new class extends Component {
    public $users;

    public function mount()
    {
        $this->loadUsers();
    }

    #[On('points-updated')]
    public function loadUsers()
    {
        $this->users = User::with('level')
            ->orderBy('total_points', 'desc')
            ->take(5)
            ->get();
    }
}; ?>

<div class="glass-card">
    <div class="p-6 border-b border-white/10">
        <h4 class="font-bold">Global Leaderboard</h4>
    </div>
    
    <div class="divide-y divide-white/5">
        @foreach($users as $index => $leader)
            <div class="p-4 flex items-center justify-between hover:bg-white/5 transition-colors">
                <div class="flex items-center">
                    <span class="w-6 text-sm font-bold {{ $index == 0 ? 'text-yellow-400' : ($index == 1 ? 'text-slate-300' : ($index == 2 ? 'text-orange-400' : 'text-slate-500')) }}">
                        #{{ $index + 1 }}
                    </span>
                    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center text-xs ml-2">
                        {{ substr($leader->name, 0, 1) }}
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-bold line-clamp-1">{{ $leader->name }}</p>
                        <p class="text-[10px] text-slate-500 uppercase tracking-tighter">{{ $leader->level->name ?? 'Level 1' }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-black text-indigo-400">{{ number_format($leader->total_points) }}</p>
                    <p class="text-[8px] text-slate-500 uppercase">Points</p>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="p-4 text-center">
        <button class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors uppercase font-bold tracking-widest">
            View Full Standings
        </button>
    </div>
</div>
