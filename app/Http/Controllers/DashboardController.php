<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $this->ensureLogin();
        
        $user = Auth::user()->load('level');
        $badges = Badge::orderBy('points_required', 'asc')->get();
        $userBadges = $user->badges->pluck('id')->toArray();

        $data = $this->getProgressData($user);

        return view('dashboard', array_merge($data, [
            'user' => $user,
            'badges' => $badges,
            'userBadges' => $userBadges,
        ]));
    }

    public function badges()
    {
        $this->ensureLogin();
        $user = Auth::user();
        $badges = Badge::orderBy('points_required', 'asc')->get();
        $userBadges = $user->badges->pluck('id', 'name')->toArray();

        return view('badges', compact('user', 'badges', 'userBadges'));
    }

    public function quizzes()
    {
        $this->ensureLogin();
        return view('quizzes');
    }

    public function leaderboard()
    {
        $this->ensureLogin();
        $topUsers = User::with('level')->orderBy('total_points', 'desc')->paginate(20);
        return view('leaderboard', compact('topUsers'));
    }

    private function ensureLogin()
    {
        if (!Auth::check()) {
            $user = User::first();
            if ($user) Auth::login($user);
        }
    }

    private function getProgressData($user)
    {
        $nextLevel = Level::where('min_points', '>', $user->total_points)
            ->orderBy('min_points', 'asc')
            ->first();

        $progress = 100;
        if ($nextLevel) {
            $currentMin = $user->level->min_points ?? 0;
            $nextMin = $nextLevel->min_points;
            $progress = (($user->total_points - $currentMin) / ($nextMin - $currentMin)) * 100;
        }

        return [
            'nextLevel' => $nextLevel,
            'progress' => $progress,
        ];
    }
}
