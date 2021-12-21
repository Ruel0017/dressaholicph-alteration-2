<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Employee = [
            [
                'fullname' => 'Juan Carlos',
                'created_at' => Carbon::now(),
            ],
            [
                'fullname' => 'Jose Reyes',
                'created_at' => Carbon::now(),
            ],
            [
                'fullname' => 'Rudy Bar',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('employees')->insert($Employee);
    }
}
