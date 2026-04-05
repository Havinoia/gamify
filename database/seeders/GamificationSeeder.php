<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Level;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GamificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Levels
        $levels = [
            ['name' => 'Bronze', 'min_points' => 0, 'description' => 'Starting your journey.'],
            ['name' => 'Silver', 'min_points' => 100, 'description' => 'You are getting better!'],
            ['name' => 'Gold', 'min_points' => 500, 'description' => 'Elite member status.'],
            ['name' => 'Platinum', 'min_points' => 1500, 'description' => 'Master of the game.'],
            ['name' => 'Diamond', 'min_points' => 5000, 'description' => 'The ultimate legend.'],
        ];

        foreach ($levels as $level) {
            Level::updateOrCreate(['name' => $level['name']], $level);
        }

        // 2. Badges
        $badges = [
            ['name' => 'First Step', 'slug' => 'first-step', 'description' => 'Awarded for joining the platform.', 'points_required' => 0],
            ['name' => 'Quick Learner', 'slug' => 'quick-learner', 'description' => 'Earn 100 points to unlock.', 'points_required' => 100],
            ['name' => 'Trivia Master', 'slug' => 'trivia-master', 'description' => 'Earn 500 points to unlock.', 'points_required' => 500],
            ['name' => 'Legacy Creator', 'slug' => 'legacy-creator', 'description' => 'Earn 1500 points to unlock.', 'points_required' => 1500],
            ['name' => 'Invincible', 'slug' => 'invincible', 'description' => 'Earn 5000 points to unlock.', 'points_required' => 5000],
        ];

        foreach ($badges as $badge) {
            Badge::updateOrCreate(['slug' => $badge['slug']], $badge);
        }

        // 3. Questions (Mixed & Simple)
        $questions = [
            [
                'content' => 'Ibukota negara Indonesia adalah...',
                'points' => 20,
                'choices' => [
                    ['content' => 'Surabaya', 'is_correct' => false],
                    ['content' => 'Jakarta', 'is_correct' => true],
                    ['content' => 'Bandung', 'is_correct' => false],
                    ['content' => 'Nusantara', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Berapakah hasil dari 15 + 25?',
                'points' => 10,
                'choices' => [
                    ['content' => '30', 'is_correct' => false],
                    ['content' => '35', 'is_correct' => false],
                    ['content' => '40', 'is_correct' => true],
                    ['content' => '45', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Warna bendera Indonesia adalah...',
                'points' => 10,
                'choices' => [
                    ['content' => 'Merah Putih', 'is_correct' => true],
                    ['content' => 'Putih Merah', 'is_correct' => false],
                    ['content' => 'Biru Putih', 'is_correct' => false],
                    ['content' => 'Merah Kuning', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Singkatan dari "WWW" dalam alamat website adalah...',
                'points' => 30,
                'choices' => [
                    ['content' => 'World Wide Web', 'is_correct' => true],
                    ['content' => 'World Web Wide', 'is_correct' => false],
                    ['content' => 'Web World Wide', 'is_correct' => false],
                    ['content' => 'Wide World Web', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Shortcut keyboard untuk menyalin (copy) teks adalah...',
                'points' => 20,
                'choices' => [
                    ['content' => 'Ctrl + X', 'is_correct' => false],
                    ['content' => 'Ctrl + V', 'is_correct' => false],
                    ['content' => 'Ctrl + C', 'is_correct' => true],
                    ['content' => 'Ctrl + S', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Berapakah jumlah kaki pada laba-laba?',
                'points' => 20,
                'choices' => [
                    ['content' => '6', 'is_correct' => false],
                    ['content' => '8', 'is_correct' => true],
                    ['content' => '10', 'is_correct' => false],
                    ['content' => '4', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Planet manakah yang dijuluki sebagai "Planet Merah"?',
                'points' => 30,
                'choices' => [
                    ['content' => 'Venus', 'is_correct' => false],
                    ['content' => 'Jupiter', 'is_correct' => false],
                    ['content' => 'Mars', 'is_correct' => true],
                    ['content' => 'Saturnus', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Hewan apa yang dikenal sebagai "Raja Hutan"?',
                'points' => 20,
                'choices' => [
                    ['content' => 'Harimau', 'is_correct' => false],
                    ['content' => 'Singa', 'is_correct' => true],
                    ['content' => 'Gajah', 'is_correct' => false],
                    ['content' => 'Beruang', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Apa bahan utama pembuat tempe?',
                'points' => 15,
                'choices' => [
                    ['content' => 'Gandum', 'is_correct' => false],
                    ['content' => 'Kedelai', 'is_correct' => true],
                    ['content' => 'Jagung', 'is_correct' => false],
                    ['content' => 'Padi', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Siapa penemu lampu pijar?',
                'points' => 40,
                'choices' => [
                    ['content' => 'Isaac Newton', 'is_correct' => false],
                    ['content' => 'Albert Einstein', 'is_correct' => false],
                    ['content' => 'Thomas Alva Edison', 'is_correct' => true],
                    ['content' => 'Alexander Graham Bell', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Dalam permainan sepak bola, satu tim terdiri dari berapa pemain?',
                'points' => 10,
                'choices' => [
                    ['content' => '9 orang', 'is_correct' => false],
                    ['content' => '10 orang', 'is_correct' => false],
                    ['content' => '11 orang', 'is_correct' => true],
                    ['content' => '12 orang', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Apa nama samudra terluas di dunia?',
                'points' => 30,
                'choices' => [
                    ['content' => 'Hindia', 'is_correct' => false],
                    ['content' => 'Atlantik', 'is_correct' => false],
                    ['content' => 'Pasifik', 'is_correct' => true],
                    ['content' => 'Arktik', 'is_correct' => false],
                ]
            ],
            [
                'content' => 'Seni melipat kertas dari Jepang disebut...',
                'points' => 20,
                'choices' => [
                    ['content' => 'Ikebana', 'is_correct' => false],
                    ['content' => 'Origami', 'is_correct' => true],
                    ['content' => 'Bonsai', 'is_correct' => false],
                    ['content' => 'Sushi', 'is_correct' => false],
                ]
            ],
        ];

        foreach ($questions as $qData) {
            $choices = $qData['choices'];
            unset($qData['choices']);
            $question = Question::create($qData);
            foreach ($choices as $choice) {
                $question->choices()->create($choice);
            }
        }
    }
}
