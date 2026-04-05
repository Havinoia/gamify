<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create a Primary Admin Operative
        User::create([
            'name' => 'Admin Operative',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'level_id' => 1,
            'total_points' => 2500, // Starts at Level 4/5
        ]);

        // 2. Create a Test Operative
        User::create([
            'name' => 'Ghost Operative',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'level_id' => 1,
            'total_points' => 500, // Starts at Level 3
        ]);

        // 3. Create Random Operatives for Leaderboard
        User::factory()->count(25)->create();

        // 4. Update Level IDs based on Points
        $users = User::all();
        foreach ($users as $user) {
            $level = Level::where('min_points', '<=', $user->total_points)
                ->orderBy('min_points', 'desc')
                ->first();
            
            if ($level) {
                $user->update(['level_id' => $level->id]);
            }
        }
    }
}
