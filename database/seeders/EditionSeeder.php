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
                'title' => 'Minecraft Clasico',
                'subtitle' => 'Sumergite en el mundo de Minecraft Java / Bedrock, donde podés construir, explorar y sobrevivir en un universo procedural lleno de posibilidades.',
                'content' => 'Minecraft Clásico es el corazón de la experiencia Minecraft. Desde la supervivencia básica hasta la construcción de gigantescas estructuras, este juego te permite explorar mundos infinitos, recolectar recursos, fabricar herramientas y enfrentarte a criaturas peligrosas por la noche. Podés jugar solo o con amigos, y personalizar tu mundo con mods, texturas y shaders. Es una aventura sin límites donde tu creatividad es el único tope. Tanto si sos nuevo como veterano, Minecraft Clásico sigue siendo el punto de partida perfecto para crear tu historia en bloques.',
                'image' => 'editions/banner-mc.webp',
                'bestseller' => true,
                'price' => 29.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Minecraft Dungeons',
                'subtitle' => 'Embárcate en una aventura llena de acción, enemigos y botín. Inspirado en los clásicos dungeon crawlers, dentro del universo de Minecraft.',
                'content' => 'Minecraft Dungeons es una experiencia completamente diferente dentro del universo Minecraft. Se trata de un juego de acción cooperativa en el que explorás mazmorras, enfrentás hordas de enemigos, obtenés poderosas armas y desbloqueás habilidades especiales. Con un enfoque más dinámico y centrado en el combate, podés jugar solo o junto a otros jugadores para enfrentarte al malvado Arch-Illager. Con niveles generados proceduralmente y un sistema de loot adictivo, Dungeons es perfecto para los fans del combate en tiempo real y la exploración rápida.',
                'image' => 'editions/banner-mc-dungeons.webp',
                'bestseller' => false,
                'price' =>  12.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Minecraft Legends',
                'subtitle' => 'Liderá el campo de batalla en una épica aventura de estrategia en tiempo real ambientada en el universo de Minecraft, defendiendo el Overworld de los Piglins.',
                'content' => 'Minecraft Legends te invita a experimentar un nuevo enfoque en el universo Minecraft, combinando acción y estrategia. Como líder de la resistencia, tu misión es unir fuerzas con aliados del Overworld y proteger la tierra de una invasión Piglin. Controlá unidades, construí defensas y comandá batallas masivas en un entorno vibrante y dinámico. El juego ofrece una campaña narrativa, misiones cooperativas y modos PvP competitivos. Con gráficos estilizados y jugabilidad accesible, Minecraft Legends es ideal para quienes disfrutan de la estrategia pero sin dejar de lado la acción directa.',
                'image' => 'editions/banner-mc-legends.webp',
                'bestseller' => false,
                'price' =>  12.99,
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
