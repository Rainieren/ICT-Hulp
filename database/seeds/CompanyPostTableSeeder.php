<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyPostTableSeeder extends Seeder
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

            $title = $faker->sentence();

            DB::table('company_posts')->insert([
                'user_id' => rand(1, 50),
                'title' => $title,
                'slug' => str_slug($title),
                'company_id' => rand(1,30),
                'text' => $faker->paragraph(),
                'channel_id' => rand(1,14),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }
    }
}
