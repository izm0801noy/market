<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PurchaseHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_histories')->insert([
            [
                'user_id' => 1,
                'item_id' => 2,
                'quantity' => 3,
                'total_price' => 4500,
                'purchase_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'item_id' => 1,
                'quantity' => 1,
                'total_price' => 1500,
                'purchase_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
