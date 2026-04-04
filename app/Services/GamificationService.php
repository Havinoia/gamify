<?php

namespace App\Services;

use App\Models\User;
use App\Models\Badge;
use App\Models\Level;
use App\Models\Point;
use Illuminate\Database\Eloquent\Model;

class GamificationService
{
    /**
     * Add points to a user.
     */
    public function addPoints(User $user, int $amount, string $reason, Model $source = null): void
    {
        $user->points()->create([
            'amount' => $amount,
            'reason' => $reason,
            'source_id' => $source?->getKey(),
            'source_type' => $source ? $source::class : null,
        ]);

        $user->increment('total_points', $amount);
        $user->update(['last_point_earned_at' => now()]);

        $this->syncLevel($user);
        $this->checkBadges($user);
    }

    /**
     * Sync user level based on total points.
     */
    public function syncLevel(User $user): void
    {
        $newLevel = Level::where('min_points', '<=', $user->total_points)
            ->orderBy('min_points', 'desc')
            ->first();

        if ($newLevel && $user->level_id !== $newLevel->id) {
            $user->update(['level_id' => $newLevel->id]);
            // Potential event for level up
        }
    }

    /**
     * Check and award badges based on progress.
     */
    public function checkBadges(User $user): void
    {
        $eligibleBadges = Badge::where('points_required', '<=', $user->total_points)
            ->whereDoesntHave('users', fn($q) => $q->where('user_id', $user->id))
            ->get();

        foreach ($eligibleBadges as $badge) {
            $user->badges()->attach($badge->id);
            // Potential event for badge earned
        }
    }
}
