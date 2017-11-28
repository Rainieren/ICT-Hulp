<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();



        foreach(range(1, 30) as $index) {

            $title = $faker->sentence;

            DB::table('posts')->insert([
                'user_id' => rand(1, 50),
                'channel_id' => rand(1,14),
                'title' => $title,
                'slug' => str_slug($title),
                'text' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }
    }
}
