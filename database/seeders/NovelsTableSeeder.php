<?php

namespace Database\Seeders;

use App\Models\Novel;
use Illuminate\Database\Seeder;

class NovelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Novel::factory()->times(20)->create();
    }
}
