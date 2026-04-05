<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Level;
use Livewire\Attributes\On;

new class extends Component {
    public $totalPoints;

    public function mount()
    {
        $this->totalPoints = Auth::user()->total_points ?? 0;
    }

    #[On('points-updated')]
    public function updatePoints()
    {
        $this->totalPoints = Auth::user()->total_points;
    }
}; ?>

<div class="flex items-center space-x-6 h-full font-mono relative" wire:poll.5s>
    <!-- XP Counter (Dark 90s Style) -->
    <div class="pr-6 border-r-[4px] border-pixel-matrix/20 text-right">
        <p class="text-[8px] font-heading text-pixel-pink mb-1 underline">XP_TOTAL</p>
        <p class="text-2xl font-mono text-white tracking-tighter leading-none">{{ number_format($totalPoints) }}</p>
    </div>

    <!-- Rank Badge (Static - Display Only) -->
    <div class="flex flex-col items-start bg-[#1a1f2e] border-[4px] border-pixel-matrix px-4 py-2 shadow-[4px_4px_0px_0px_#000] relative">
        <span class="text-[8px] font-heading text-pixel-pink mb-1 underline">SYSTEM_RANK</span>
        <span class="text-xs font-heading text-white tracking-widest">{{ strtoupper(Auth::user()->level?->name ?? 'NOVICE') }}</span>
    </div>
</div>
