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

<div class="pixel-card-secondary p-8 font-mono bg-[#1a1f2e] relative overflow-hidden" x-data @quiz-success.window="confetti({
    particleCount: 150,
    spread: 70,
    origin: { y: 0.6 },
    colors: ['#ff00ff', '#00ffff', '#ffff00']
})">
    @if($question)
        <div class="mb-10 border-b-[6px] border-pixel-matrix/40 pb-4 bg-pixel-yellow -mx-8 -mt-8 p-6 shadow-[inset_0_-4px_0_0_rgba(0,0,0,0.3)]">
            <span class="text-[8px] font-heading text-black uppercase tracking-widest mb-3 block underline font-black">>> MISSION_OBJECTIVE_v1.0</span>
            <h3 class="text-sm font-heading text-black leading-relaxed italic drop-shadow-[2px_2px_0_#fff] uppercase">{{ $question->content }}</h3>
        </div>

        <!-- Choices Grid -->
        <div class="grid grid-cols-1 gap-6">
            @foreach($question->choices as $choice)
                @php 
                    $isUserSelection = $answered && $selectedChoice == $choice->id;
                    $isCorrectAnswer = $answered && $choice->is_correct;
                    
                    $bgColor = 'bg-white';
                    $borderColor = 'border-white';
                    $textColor = 'text-black';
                    $shadowColor = 'rgba(0,0,0,0.5)';
                    $icon = '[*]';
                    
                    if ($answered) {
                        if ($isCorrectAnswer) {
                            $bgColor = 'bg-pixel-matrix';
                            $borderColor = 'border-pixel-matrix shadow-[0_0_20px_#39ff14]';
                            $textColor = 'text-black';
                            $icon = '✔';
                        } elseif ($isUserSelection) {
                            $bgColor = 'bg-red-500';
                            $borderColor = 'border-white';
                            $textColor = 'text-white';
                            $icon = '✘';
                        } else {
                            $bgColor = 'bg-black/20';
                            $borderColor = 'border-white/10';
                            $textColor = 'text-white/20';
                            $shadowColor = 'transparent';
                        }
                    }
                @endphp

                <button 
                    @if(!$answered) wire:click="submitAnswer({{ $choice->id }})" @endif
                    class="px-6 py-4 font-heading text-[10px] uppercase border-[4px] {{ $borderColor }} {{ $bgColor }} {{ $textColor }} shadow-[8px_8px_0px_0px_{{ $shadowColor }}] transition-all cursor-pointer text-left @if(!$answered) hover:-translate-y-1 hover:bg-white/90 @endif group relative overflow-hidden"
                    {{ $answered ? 'disabled' : '' }}
                >
                    <span class="mr-3 font-black {{ $isCorrectAnswer ? 'animate-bounce' : '' }}">{{ $icon }}</span>
                    {{ strtoupper($choice->content) }}
                    
                    @if($answered && $isCorrectAnswer)
                        <div class="absolute -right-2 -bottom-2 text-4xl opacity-20">👍</div>
                    @endif
                </button>
            @endforeach
        </div>

        @if($answered)
            <!-- Feedback Section -->
            <div class="mt-10 animate-in zoom-in duration-300">
                <div class="p-6 border-[4px] {{ $isCorrect ? 'border-pixel-matrix bg-pixel-matrix text-black shadow-[8px_8px_0px_0px_rgba(57,255,20,0.3)]' : 'border-red-500 bg-red-500 text-white shadow-[8px_8px_0px_0px_rgba(239,68,68,0.3)]' }} font-heading text-[10px]">
                    <p class="mb-4 underline font-black uppercase italic tracking-widest leading-none">
                        {{ $isCorrect ? '>> MISSION_ACCOMPLISHED_OK' : '>> MISSION_FAILED_ERROR' }}
                    </p>
                    <p class="text-xs lowercase font-mono bg-black/20 p-3 border-2 border-black/10 leading-relaxed">{{ $message }}</p>
                </div>

                <button 
                    wire:click="loadQuestion" 
                    class="pixel-btn-matrix w-full text-center py-5 mt-8 text-[12px] font-black shadow-[8px_8px_0px_0px_rgba(0,0,0,0.5)] active:translate-x-[2px] active:translate-y-[2px] cursor-pointer"
                >
                    INITIATE_NEXT_MISSION >>
                </button>
            </div>
        @endif
    @else
        <div class="text-center py-10 scale-effect">
            <p class="text-[10px] font-heading text-black italic animate-pulse bg-pixel-yellow border-4 border-dashed border-black p-6">DATABASE_SYNC_ERROR: NO_QUESTIONS_FOUND</p>
        </div>
    @endif
</div>