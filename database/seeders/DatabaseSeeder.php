<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Model\Restaurant;

use App\Models\Model\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Model\Restaurant::factory(60)->create();
        \App\Models\Model\Rating::factory(60)->create();

    }
}
