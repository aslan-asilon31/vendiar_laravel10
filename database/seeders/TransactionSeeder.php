<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop for today
        for ($i = 0; $i < 100; $i++) {
            Transaction::create([
                'total_price' => rand(100000, 5000000),
                'created_at'  => Carbon::today(),
            ]);
        }

        // Loop for yesterday
        // for ($i = 0; $i < 50; $i++) {
        //     Transaction::create([
        //         'total_price' => rand(100000, 5000000),
        //         'created_at'  => Carbon::yesterday(),
        //     ]);
        // }

        // Loop for Carbon::now()->startOfWeek()
        // for ($i = 0; $i < 50; $i++) {
        //     Transaction::create([
        //         'total_price' => rand(100000, 5000000),
        //         'created_at'  => Carbon::now()->startOfWeek(),
        //     ]);
        // }

    }
}
