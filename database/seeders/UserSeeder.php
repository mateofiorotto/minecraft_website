<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
//para fechas aleatorias:
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Fiorotto Mateo',
                'email' => 'mateo.fiorotto@davinci.edu.ar',
                'password' => Hash::make('mateito123'),
                'role' => 'admin',
                'username' => 'mateofiorotto',
                //carbon now saca la fecha actual
                //subDays resta dias a la fecha actual y rand genera un numero aleatorio entre 1 y 365 que seran los dias restados a hoy
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'username' => 'testuser',
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'password' => Hash::make('password'), 
                'role' => 'user',
                'username' => Str::random(10),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
                'updated_at' => Carbon::now()
            ]
        ]);

        //Juegos que el user compro
        DB::table('acquisitions')->insert([
        [
            'user_id' => 1,
            'edition_id' => 1,
            'buy_date' => Carbon::now()->subDays(3),
            'status' => 'buyed',
            'created_at' => Carbon::now()->subDays(3),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 1,
            'edition_id' => 2,
            'buy_date' => Carbon::now()->subDays(5),
            'status' => 'buyed',
            'created_at' => Carbon::now()->subDays(5),
            'updated_at' => Carbon::now(),
        ],
        [
            'user_id' => 2,
            'edition_id' => 1,
            'buy_date' => Carbon::now()->subDays(13),
            'status' => 'buyed',
            'created_at' => Carbon::now()->subDays(13),
            'updated_at' => Carbon::now(),
        ],
    ]);
    }
}
