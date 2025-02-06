<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
            'item_id' => 'W001',
            'product' => '腕時計',
            'price' => 15000,
            'product_description' => 'スタイリッシュなデザインのメンズ腕時計',
            'product_state' => '良好',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W002',
            'product' => 'HDD',
            'price' => 5000,
            'product_description' => '高速で信頼性の高いハードディスク',
            'product_state' => '目立った傷や汚れなし',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W003',
            'product' => '玉ねぎ3束',
            'price' => 300,
            'product_description' => '新鮮な玉ねぎ3束のセット',
            'product_state' => '目やや傷や汚れあり',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W004',
            'product' => '革靴',
            'price' => 4000,
            'product_description' => 'クラシックなデザインの革靴',
            'product_state' => '状態が悪い',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W005',
            'product' => 'ノートPC',
            'price' => 45000,
            'product_description' => '高性能なノートパソコン',
            'product_state' => '良好',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W006',
            'product' => 'マイク',
            'price' => 8000,
            'product_description' => '高音質のレコーディング用マイク',
            'product_state' => '目立った傷や汚れなし',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W007',
            'product' => 'ショルダーバッグ',
            'price' => 3500,
            'product_description' => 'おしゃれなショルダーバッグ',
            'product_state' => 'やや傷や汚れあり',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W008',
            'product' => 'タンブラー',
            'price' => 500,
            'product_description' => '使いやすいタンブラー',
            'product_state' => '状態が悪い',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Tumbler+souvenir.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W009',
            'product' => 'コーヒーミル',
            'price' => 4000,
            'product_description' => '手動のコーヒーミル',
            'product_state' => '良好',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'item_id' => 'W010',
            'product' => 'メイクセット',
            'price' => 2500,
            'product_description' => '便利なメイクアップセット',
            'product_state' => '目立った傷や汚れなし',
            'image' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
