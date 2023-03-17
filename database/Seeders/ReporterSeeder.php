<?php

namespace Database\Seeders;

use App\Models\Reporter;
use Illuminate\Database\Seeder;

class ReporterSeeder extends Seeder
{
    public function run()
    {
        Reporter::factory()
            ->count(20)
            ->create();
    }

}
