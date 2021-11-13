<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class clothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $clothes = [
            [
                'clothesName' => 'Barong',
                'created_at' => Carbon::now(),
            ],

            [
                'clothesName' => 'Blouse',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Dress',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Gown',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Jacket/Hoodie',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Pants/Jeans',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Polo',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Shirt',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Short',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Skirt',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Uniform',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Slacks',
                'created_at' => Carbon::now(),
            ],
            [
                'clothesName' => 'Costume',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('types_of_clothes')->insert($clothes);
    }
}
