<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'status' => 'Denied',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'For Approval',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'For Payment',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'Partially Paid',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'Fully Paid',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'Assigned',
                'created_at' => Carbon::now()
            ],
            [
                'status' => 'N/A',
                'created_at' => Carbon::now()
            ],

        ];

        DB::table('statuses')->insert($status);
    }
}
