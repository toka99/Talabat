<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Model\Restaurant;
use App\Models\Model\User;
use App\Models\Model\Rating;
use App\Models\Model\Vendor;
use App\Models\Model\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Model\Restaurant::factory(100)->create();
        // \App\Models\Model\Rating::factory(200)->create();
        // \App\Models\Model\Vendor::factory(10)->create();
        // \App\Models\Model\User::factory(50)->create();
        \App\Models\Model\Admin::factory(1)->create();

    }
}
