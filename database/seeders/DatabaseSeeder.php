<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(clothesSeeder::class);
        $this->call(repairSeed::class);
        $this->call(fabricSeed::class);
        $this->call(repairPricesSeed::class);
        $this->call(statusSeeder::class);
        $this->call(employeeSeeder::class);
    }
}
