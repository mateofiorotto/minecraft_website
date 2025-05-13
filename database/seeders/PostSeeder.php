<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Ejecutar seeders para rellenar campos en la DB de posts
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Minecraft 1.21 - Actualización de las Tricky Trials: una revisión simple',
                'subtitle' => 'Sub1',
                'content' => 'Contenido largo 1',
                'image' => 'posts/trial-chambers.jpg', //servira como portada de post y banner
                'active' => true,
                'category_id' => 1, //actualizaciones (1)
                'created_at' => Carbon::now()->subDays(rand(1, 25)),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Este mod revoluciona el juego totalmente: una experiencia distinta',
                'subtitle' => 'Sub2',
                'content' => 'Contenido largo 2',
                'image' => 'posts/mod-revolucionario.jpg',
                'active' => true,
                'category_id' => 2, //mods y add-ons (1)
                'created_at' => Carbon::now()->subDays(rand(1, 25)),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Nuevo evento de lanzamiento: la película de Minecraft',
                'subtitle' => 'Sub3',
                'content' => 'Contenido largo 3',
                'image' => 'posts/pelicula-minecraft.jpg', //servira como portada de post y banner
                'active' => true,
                'category_id' => 3, //eventos (1)
                'created_at' => Carbon::now()->subDays(rand(1, 25)),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Los shaders mas realistas: visualmente impactante',
                'subtitle' => 'Sub4',
                'content' => 'Contenido largo 4',
                'image' => 'posts/shaders-realistas.jpg',
                'active' => true,
                'category_id' => 2, //mods y add-ons (2)
                'created_at' => Carbon::now()->subDays(rand(1, 25)),
                'updated_at' => Carbon::now(),
            ],
            [
               'title' => 'Se acerca la Mob Vote: vota a tu mob favorito',
               'subtitle' => 'Sub5',
                'content' => 'cont largo 5',
                'image' => 'posts/mob-vote.jpg', //servira como portada de post y banner
                'active' => true,
                'category_id' => 3, //evento (2)
                'created_at' => Carbon::now()->subDays(rand(1, 25)),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
