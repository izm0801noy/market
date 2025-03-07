<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = \App\Models\Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->sentence,
            'img_url' => $this->faker->imageUrl(),
            'condition' => $this->faker->randomElement(['new', 'used', 'refurbished']),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        return [
            'name' => $this->faker->randomElement(['腕時計', 'HDD', '玉ねぎ3束', '革靴', 'ノートPC', 'マイク', 'ショルダーバッグ', 'タンブラー', 'コーヒーミル', 'メイクセット']),
            'price' => $this->faker->randomElement([15000, 5000, 300, 4000, 45000, 8000, 3200, 3500, 4000, 2500]),
            'description' => $this->faker->randomElement([
                'スタイリッシュなデザインのメンズ腕時計',
                '高速で信頼性の高いハードディスク',
                '新鮮な玉ねぎ3束のセット',
                'クラシックなデザインの革靴',
                '高性能なノートパソコン',
                '高音質のレコーディング用マイク',
                'おしゃれなショルダーバッグ',
                '使いやすいタンブラー',
                '手動のコーヒーミル',
                '便利なメイクアップセット'
            ]),
            'img_url' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/sample.jpg',
            'condition' => $this->faker->randomElement(['良好', '目立った傷や汚れなし', 'やや傷や汚れあり', '状態が悪い']),
        ];
    }
}
