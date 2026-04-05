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

<div class="space-y-4">
    @foreach($users as $index => $leader)
        <div class="flex items-center justify-between p-3 border-[4px] border-pixel-matrix bg-[#070b13] hover:bg-pixel-matrix group transition-all shadow-[4px_4px_0px_0px_rgba(0,0,0,0.5)]">
            <div class="flex items-center">
                <span class="font-heading text-[10px] {{ $index < 3 ? 'text-pixel-pink' : 'text-slate-500' }} w-8">#{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <div class="w-10 h-10 border-[3px] border-pixel-matrix bg-black/40 flex items-center justify-center font-heading text-[10px] text-white group-hover:bg-black group-hover:text-pixel-matrix transition-colors shadow-[2px_2px_0px_0px_#000]">
                    {{ substr($leader->name, 0, 1) }}
                </div>
                <div class="ml-4">
                    <p class="font-heading text-[8px] text-white group-hover:text-black transition-colors uppercase truncate w-24">{{ $leader->name }}</p>
                    <p class="text-[6px] text-pixel-matrix font-mono tracking-tighter uppercase font-bold group-hover:text-black transition-colors">{{ $leader->level->name ?? 'Level 1' }}</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-[12px] font-mono text-white group-hover:text-black leading-none mb-1 font-black underline">{{ number_format($leader->total_points) }}</p>
                <p class="text-[6px] font-heading text-pixel-pink group-hover:text-white uppercase tracking-tighter">XP_VAL</p>
            </div>
        </div>
    @endforeach

    <div class="pt-4">
        <a href="{{ route('leaderboard') }}" class="pixel-btn text-[8px] w-full text-center hover:bg-black hover:text-white transition-all font-black">
            VIEW_FULL_RANKINGS >>
        </a>
    </div>
</div>
