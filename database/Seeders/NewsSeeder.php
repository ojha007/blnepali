<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Reporter;
use App\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(20)->create();
        $reporters = Reporter::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        News::factory()
            ->count(1000)
            ->create([
                'created_by' => array_rand($users),
                'updated_by' => array_rand($users),
                'reporter_id' => array_rand($reporters)
            ]);
    }
}
