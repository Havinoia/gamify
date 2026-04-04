<?php

use Livewire\Volt\Component;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Services\GamificationService;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $question;
    public $selectedChoice = null;
    public $message = '';
    public $isCorrect = false;
    public $answered = false;

    public function mount()
    {
        $this->loadQuestion();
    }

    public function loadQuestion()
    {
        $this->question = Question::with('choices')->where('is_active', true)->inRandomOrder()->first();
        $this->answered = false;
        $this->selectedChoice = null;
        $this->message = '';
    }

    public function submitAnswer($choiceId)
    {
        if ($this->answered) return;

        $this->selectedChoice = $choiceId;
        $choice = QuestionChoice::find($choiceId);

        if ($choice->is_correct) {
            $this->isCorrect = true;
            $this->message = "Tepat sekali! Anda mendapatkan {$this->question->points} poin.";
            
            $service = app(GamificationService::class);
            $service->addPoints(Auth::user(), $this->question->points, "Menjawab dengan benar: {$this->question->content}", $this->question);
            
            $this->dispatch('quiz-success');
        } else {
            $this->isCorrect = false;
            $this->message = "Kurang tepat! Coba lagi ya.";
        }

        $this->answered = true;
        $this->dispatch('points-updated');
    }
};
?>

<div class="pixel-card-secondary p-8 font-mono bg-black/40" x-data @quiz-success.window="confetti({
    particleCount: 150,
    spread: 70,
    origin: { y: 0.6 },
    colors: ['#00ff41', '#ff00ff', '#00f3ff']
})">
    @if($question)
        <div class="mb-10 border-b-2 border-dashed border-white/20 pb-4">
            <span class="text-[8px] font-heading text-pixel-pink uppercase tracking-widest mb-3 block">>> MISSION_OBJECTIVE</span>
            <h3 class="text-sm font-heading text-white leading-relaxed">{{ $question->content }}</h3>
        </div>

        @if(!$answered)
            <div class="grid grid-cols-1 gap-4">
                @foreach($question->choices as $choice)
                    <button 
                        wire:click="submitAnswer({{ $choice->id }})" 
                        class="pixel-btn text-left hover:bg-pixel-pink hover:text-white group transition-all"
                    >
                        <span class="mr-3 opacity-50 group-hover:opacity-100">[*]</span>
                        {{ $choice->content }}
                    </button>
                @endforeach
            </div>
        @else
            <div class="p-6 border-2 {{ $isCorrect ? 'border-pixel-matrix bg-pixel-matrix/10 text-pixel-matrix' : 'border-red-500 bg-red-500/10 text-red-500' }} mb-8 font-heading text-[10px]">
                <p class="mb-2 underline">
                    {{ $isCorrect ? 'MISSION_ACCOMPLISHED!' : 'MISSION_FAILED!' }}
                </p>
                <p class="text-white text-xs lowercase font-mono">{{ $message }}</p>
            </div>

            <button 
                wire:click="loadQuestion" 
                class="pixel-btn-matrix w-full text-center"
            >
                NEXT_MISSION >>
            </button>
        @endif
    @else
        <div class="text-center py-10 scale-effect">
            <p class="text-[8px] font-heading text-slate-500 italic animate-pulse">DATABASE_EMPTY...</p>
        </div>
    @endif
</div>