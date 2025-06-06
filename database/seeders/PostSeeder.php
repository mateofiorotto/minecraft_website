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
                'title' => 'Minecraft 1.21: Las nuevas Tricky Trials',
                'subtitle' => 'Descubre todo lo que trae la versión 1.21, enfocada en las nuevas Tricky Trials, nuevos enemigos desafiantes y botín interesante.',
                'content' => 'La actualización 1.21 de Minecraft, conocida como "Tricky Trials", introduce las misteriosas Tricky Trials, una nueva estructura repleta de desafíos y recompensas. Cuentan con trampas, puzzles y mobs exclusivos, ofreciendo una experiencia diferente a las tradicionales exploraciones. También se agregaron nuevos bloques decorativos, un encantamiento inédito y ajustes generales al sistema de loot. Mojang busca con esto incentivar el juego en solitario y cooperativo, con retos más dinámicos que premian la estrategia. Los jugadores veteranos disfrutarán de una nueva capa de complejidad en sus aventuras.',
                'image' => 'posts/trial-chambers.webp', //servira como portada de post y banner
                'active' => true,
                'category_id' => 1, //actualizaciones (1)
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'MineCells MOD: una experiencia distinta',
                'subtitle' => 'MineCells transforma completamente Minecraft, aportando mecánicas únicas, nuevas dimensiones y enemigos impredecibles.',
                'content' => 'La comunidad de mods de Minecraft nunca deja de sorprender, y este nuevo mod lo demuestra. Cambia por completo la experiencia clásica del juego: añade una nueva dimensión con su propia física, mobs inteligentes que aprenden de tus acciones y un sistema de progresión tipo RPG. Además, introduce biomas visualmente impresionantes y armas con habilidades especiales. Ideal para jugadores que buscan un desafío más profundo, este mod requiere adaptarse y pensar diferente. Se posiciona como uno de los mods más ambiciosos del año, y ya cuenta con miles de descargas en apenas semanas.El mod se llama MineCells.',
                'image' => 'posts/minecells.webp',
                'active' => true,
                'category_id' => 2, //mods y add-ons (1)
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Lanzamiento de la película de Minecraft',
                'subtitle' => 'Mojang y Warner Bros. anuncian el esperado estreno de la película oficial de Minecraft con eventos especiales dentro y fuera del juego.',
                'content' => 'La película de Minecraft está más cerca que nunca. Mojang ha revelado detalles sobre el evento de lanzamiento global que incluirá celebraciones tanto en cines como dentro del propio juego. Los jugadores podrán participar en desafíos temáticos, recibir recompensas cosméticas exclusivas y acceder a un servidor temporal inspirado en la película. El filme mezcla acción en vivo con CGI, y contará con la participación de actores reconocidos. La narrativa buscará capturar la esencia de la creatividad, la supervivencia y el trabajo en equipo que define a Minecraft, tanto para los fans antiguos como los más nuevos.',
                'image' => 'posts/pelicula-minecraft.webp', //servira como portada de post y banner
                'active' => true,
                'category_id' => 3, //eventos (1)
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Los shaders mas realistas: visualmente impactante',
                'subtitle' => 'Explora cómo los shaders llevan a Minecraft a tener gráficos increibles, con luces dinámicas, sombras realistas y entornos inmersivos.',
                'content' => 'Minecraft es conocido por su estilo visual pixelado, pero con la ayuda de shaders modernos como SEUS, BSL y Continuum, los jugadores pueden transformar su mundo en algo visualmente asombroso. Estos paquetes introducen efectos de iluminación global, sombras suaves, reflejos en el agua y cielos dinámicos que cambian con el clima y la hora del día. El resultado es una experiencia que combina lo nostálgico con lo cinematográfico. Aunque requieren una buena GPU, la mejora visual es espectacular. Cada bloque parece cobrar vida, haciendo que la exploración se sienta completamente renovada.',
                'image' => 'posts/shaders-realistas.webp',
                'active' => true,
                'category_id' => 2, //mods y add-ons (2)
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Se acerca la Mob Vote: vota a tu mob favorito',
                'subtitle' => 'La Mob Vote regresa este año con tres nuevos mobs candidatos que podrían cambiar el futuro del juego según el voto de la comunidad global.',
                'content' => 'Uno de los eventos más esperados por la comunidad vuelve este año: la Mob Vote. Mojang presentó tres criaturas inéditas con habilidades especiales, cada una diseñada para aportar nuevas mecánicas y retos al juego. Los jugadores podrán votar en tiempo real a través del launcher oficial, el sitio web y servidores dedicados. Esta edición promete una competencia reñida, ya que cada mob tiene un fuerte respaldo por parte de los fans. El mob ganador será implementado en la próxima gran actualización, haciendo que cada voto cuente realmente. ¡Prepárate para decidir el futuro de Minecraft!',
                'image' => 'posts/mob-vote.webp', //servira como portada de post y banner
                'active' => true,
                'category_id' => 3, //evento (2)
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('post_tag')->insert([
            //post 1: nueva version, snapshot, correccion de bugs
            [
                'post_id' => 1,
                'tag_id' => 1
            ],
            [
                'post_id' => 1,
                'tag_id' => 2
            ],
            [
                'post_id' => 1,
                'tag_id' => 3
            ],
            //Post 2: forge y fabric
            [
                'post_id' => 2,
                'tag_id' => 4
            ],
            [
                'post_id' => 2,
                'tag_id' => 5
            ],
            //post 3: tiempo limitado
            [
                'post_id' => 3,
                'tag_id' => 7
            ],
            //post 4: sodium & optifine
            [
                'post_id' => 4,
                'tag_id' => 6
            ],
            //post 5: tiempo limitado
            [
                'post_id' => 5,
                'tag_id' => 7
            ],

        ]);
    }
}
