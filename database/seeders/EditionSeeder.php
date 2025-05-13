<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seeder para ediciones de juegos
        DB::table('editions')->insert([
            [
                'title' => 'Minecraft Java & Bedrock Edition',
                'subtitle' => 'Explore and create your own endless world. Survive the night in the last sandbox game.',
                'content' => '',
                'image' => 'banner-mc.jpg',
                'bestseller' => true,
                'price' => 29.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
               'title' => 'Minecraft Dungeons',
               'subtitle' => 'A game of action and adventure inspired by classic dungeon crawlers and set in the Minecraft universe.',
                'content' => '',
                'image' => 'banner-mc-dungeons.jpg',
                'bestseller' => false,
                'price' =>  12.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ], 
            [
                'title' => 'Minecraft Legends',
                'subtitle' => 'A new game of action and strategy. Lead your allies in heroic battles to defend the Piglins',
                'content' => '',
                'image' => 'banner-mc-legends.jpg',
                'bestseller' => false,
                'price' =>  12.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ]
            ]);
        }
}
