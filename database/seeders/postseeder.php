<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use DB;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=1; $i <10 ; $i++) { 
            DB::table('posts')->insert([
                // 'title' => Str::random(10),
                'title' => $faker->name,
                 ]);

        }
    }
}
