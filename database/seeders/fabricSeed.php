<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fabricSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fabric = [
            [
                'fabricName' => 'Silked',
                'created_at' => Carbon::now(),
            ],
            [
                'fabricName' => 'Any',
                'created_at' => Carbon::now(),
            ],
            [
                'fabricName' => 'Linen',
                'created_at' => Carbon::now(),
            ],
            [
                'fabricName' => 'Cutton',
                'created_at' => Carbon::now(),
            ],
            [
                'fabricName' => 'Uniform Fabric',
                'created_at' => Carbon::now(),
            ],
            [
                'fabricName' => 'Not Available',
                'created_at' => Carbon::now(),
            ]
        ];

        DB::table('fabrics')->insert($fabric);
    }
}
