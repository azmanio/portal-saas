<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Module;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() : void
    {
        $this->call(UserSeeder::class);

        User::factory(10)->create();
        Module::factory(10)->create();
        Feature::factory(10)->create();

    }
}
