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
        <span class="text-[8px] font-heading text-pixel-matrix tracking-widest underline italic font-black">XP_PROGRESS_BAR</span>
        <span class="text-xs font-heading text-pixel-blue tracking-widest">{{ $user->total_points }} / {{ $nextLevel->min_points ?? 'MAX' }} XP</span>
    </div>

    <!-- 90s Style Segmented Progress Bar (Dark) -->
    <div class="h-10 w-full bg-black/40 border-[6px] border-pixel-matrix p-1.5 flex space-x-2 shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)]">
        @php 
            $segments = 10; 
            $activeSegmentsCount = $nextLevel ? floor(($progress / 100) * $segments) : $segments; 
        @endphp
        @for($i = 0; $i < $segments; $i++)
            <div class="flex-1 transition-all duration-700 {{ $i < $activeSegmentsCount ? 'bg-pixel-matrix border-[3px] border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,0.5)]' : 'bg-pixel-matrix/5 border-[3px] border-pixel-matrix/10' }}"></div>
        @endfor
    </div>

    <div class="flex items-center justify-between py-4 border-t-[4px] border-pixel-matrix bg-pixel-blue/90 -mx-6 px-6 -mb-6 shadow-[inset_0_4px_0_0_rgba(0,0,0,0.3)]">
        <div class="text-left">
            <p class="text-[8px] text-black font-heading mb-1 underline">SYSTEM_RANK</p>
            <p class="text-sm font-heading text-white tracking-widest drop-shadow-[2px_2px_0px_#000]">{{ strtoupper($user->level->name ?? 'NOVICE') }}</p>
        </div>
        <div class="text-right">
            <p class="text-[8px] text-black font-heading mb-1 underline">NEXT_UP</p>
            <p class="text-sm font-heading text-pixel-yellow tracking-widest drop-shadow-[2px_2px_0px_#000]">{{ strtoupper($nextLevel->name ?? 'MAX_LVL') }}</p>
        </div>
    </div>
</div>
