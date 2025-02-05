<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Sample Item 1',
                'price' => 1000,
                'description' => 'This is a sample item.',
                'img_url' => 'https://example.com/image1.jpg',
                'condition' => 'new',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sample Item 2',
                'price' => 500,
                'description' => 'Another sample item.',
                'img_url' => 'https://example.com/image2.jpg',
                'condition' => 'used',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
