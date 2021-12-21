<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class repairPricesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            [
                'clothes_id' => '1',
                'repair_id' => '1',
                'fabric_id' => '6',
                'amount' => '200',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '1',
                'repair_id' => '2',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '2',
                'repair_id' => '2',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '2',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '250',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '2',
                'repair_id' => '4',
                'fabric_id' => '6',
                'amount' => '150',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '3',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '500',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '4',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '1000',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '5',
                'repair_id' => '6',
                'fabric_id' => '6',
                'amount' => '250',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '5',
                'repair_id' => '2',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '6',
                'repair_id' => '5',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '6',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '500',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '7',
                'repair_id' => '2',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '7',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '450',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '8',
                'repair_id' => '2',
                'fabric_id' => '6',
                'amount' => '100',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '8',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '350',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '9',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '300',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '9',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '300',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '9',
                'repair_id' => '7',
                'fabric_id' => '6',
                'amount' => '150',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '10',
                'repair_id' => '8',
                'fabric_id' => '6',
                'amount' => '200',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '10',
                'repair_id' => '9',
                'fabric_id' => '6',
                'amount' => '150',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '11',
                'repair_id' => '3',
                'fabric_id' => '6',
                'amount' => '500',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '1',
                'repair_id' => '10',
                'fabric_id' => '1',
                'amount' => '1000',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '2',
                'repair_id' => '10',
                'fabric_id' => '2',
                'amount' => '900',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '3',
                'repair_id' => '10',
                'fabric_id' => '2',
                'amount' => '2000',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '4',
                'repair_id' => '10',
                'fabric_id' => '2',
                'amount' => '10000',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '7',
                'repair_id' => '10',
                'fabric_id' => '4',
                'amount' => '500',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '12',
                'repair_id' => '10',
                'fabric_id' => '3',
                'amount' => '750',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '11',
                'repair_id' => '10',
                'fabric_id' => '5',
                'amount' => '1500',
                'created_at' => Carbon::now(),
            ],
            [
                'clothes_id' => '13',
                'repair_id' => '10',
                'fabric_id' => '2',
                'amount' => '5000',
                'created_at' => Carbon::now(),
            ],

        ];

        DB::table('repair_prices')->insert($prices);
    }
}
