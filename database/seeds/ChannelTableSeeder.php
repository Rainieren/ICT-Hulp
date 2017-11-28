<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        //Role met de ID 1
        DB::table('channels')->insert([
            'channel_name' => 'HTML',
            'slug' => 'html',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'CSS',
            'slug' => 'css',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Javascript',
            'slug' => 'javascript',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'PHP',
            'slug' => 'php',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'C#',
            'slug' => 'csharp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Java',
            'slug' => 'java',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Laravel',
            'slug' => 'laravel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Ruby',
            'slug' => 'ruby',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Generaal',
            'slug' => 'generaal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Python',
            'slug' => 'python',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Database',
            'slug' => 'database',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'C++',
            'slug' => 'c++',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'CMS',
            'slug' => 'cms',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('channels')->insert([
            'channel_name' => 'Overig',
            'slug' => 'overig',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
