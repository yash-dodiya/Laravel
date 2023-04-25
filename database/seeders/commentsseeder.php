<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use DB;

class commentsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=1; $i <10 ; $i++) { 
            DB::table('comments')->insert([
                // 'title' => Str::random(10),
                'post_id' => rand(1,10),
                'comment' => $faker->name,
                'created_at'=>date("Y-m-d h:i:s"),
                 ]);

        }
    }
}
