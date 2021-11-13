<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class repairSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repair = [
            [
                'repairName' => 'Colar Change',
                'created_at' => Carbon::now(),
            ],

            [
                'repairName' => 'Simple adjustments',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Whole/Total Repair',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Two side tapering',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Cut and Hemming tips',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Change Zipper',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Cut waist',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Cut',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Zipper',
                'created_at' => Carbon::now(),
            ],
            [
                'repairName' => 'Custom Made',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('types_of_repairs')->insert($repair);
    }
}
