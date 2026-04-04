<?php

use Livewire\Volt\Component;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

new class extends Component {
    public $user;
    public $nextLevel;
    public $progress;

    public function mount()
    {
        $this->updateData();
    }

    #[On('points-updated')]
    public function updateData()
    {
        $this->user = Auth::user();
        
        $this->nextLevel = Level::where('min_points', '>', $this->user->total_points)
            ->orderBy('min_points', 'asc')
            ->first();

        $this->progress = 100;
        if ($this->nextLevel) {
            $currentMin = $this->user->level->min_points ?? 0;
            $nextMin = $this->nextLevel->min_points;
            $this->progress = (($this->user->total_points - $currentMin) / ($nextMin - $currentMin)) * 100;
        }
    }
}; ?>

<div class="space-y-6 font-mono" wire:poll.5s>
    <div class="flex items-center justify-between">
        <span class="text-[8px] font-heading text-pixel-matrix tracking-widest underline italic">XP_PROGRESS_BAR</span>
        <span class="text-xs font-heading text-white tracking-widest">{{ $user->total_points }} / {{ $nextLevel->min_points ?? 'MAX' }} XP</span>
    </div>

    <!-- Segmented Progress Bar -->
    <div class="h-10 w-full bg-black/40 border-[4px] border-white p-1.5 flex space-x-1.5 shadow-[inset_4px_4px_0px_0px_rgba(0,0,0,0.5)]">
        @php 
            $segments = 12; 
            $activeSegmentsCount = $nextLevel ? floor(($progress / 100) * $segments) : $segments; 
        @endphp
        @for($i = 0; $i < $segments; $i++)
            <div class="flex-1 transition-all duration-700 {{ $i < $activeSegmentsCount ? 'bg-pixel-matrix shadow-[0_0_12px_rgba(0,255,65,0.6)] animate-pulse' : 'bg-white/5' }}"></div>
        @endfor
    </div>

    <div class="flex items-center justify-between py-4 border-t-2 border-dashed border-white/10">
        <div class="text-left">
            <p class="text-[8px] text-slate-500 font-heading mb-1">SYSTEM_RANK</p>
            <p class="text-sm font-heading text-white tracking-widest">{{ strtoupper($user->level->name ?? 'NOVICE') }}</p>
        </div>
        <div class="text-right">
            <p class="text-[8px] text-slate-500 font-heading mb-1">NEXT_OBJECTIVE</p>
            <p class="text-sm font-heading text-pixel-matrix tracking-widest">{{ strtoupper($nextLevel->name ?? 'MAX_LEVEL') }}</p>
        </div>
    </div>
</div>
