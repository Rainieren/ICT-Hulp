<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'role_id' => 2,
            'firstname' => 'Rainier',
            'lastname' => 'Laan',
            'username' => 'Rainieren',
            'date_of_birth' => $faker->date(),
            'email' => 'rainier.laan@home.nl',
            'phonenumber' => '0631231763',
            'password' => bcrypt('US99#FA197y700'),
            'function' => $faker->sentence(4),
            'description' => $faker->text(255),
            'confirmed' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'firstname' => 'John',
            'lastname' => 'Doe',
            'username' => 'JohnDoe',
            'date_of_birth' => $faker->date(),
            'email' => 'JohnDoe@gmail.com',
            'phonenumber' => '(241) 677 8524',
            'password' => bcrypt('welkom'),
            'function' => $faker->sentence(4),
            'description' => $faker->text(255),
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'role_id' => 4,
            'firstname' => 'Media',
            'lastname' => 'Markt',
            'username' => 'Media Markt',
            'date_of_birth' => $faker->date(),
            'email' => 'mediamarkt@info.nl',
            'phonenumber' => '050 317 3000',
            'password' => bcrypt('welkom'),
            'function' => $faker->sentence(4),
            'description' => $faker->text(255),
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        foreach(range(1,47) as $index) {
            DB::table('users')->insert([
                'role_id' => 1,
                'firstname' => $faker->firstName(null),
                'lastname' => $faker->lastName,
                'username' => $faker->userName,
                'date_of_birth' => $faker->date(),
                'email' => $faker->email,
                'phonenumber' => $faker->phoneNumber,
                'password' => bcrypt('welkom'),
                'function' => $faker->sentence(4),
                'description' => $faker->text(255),
                'confirmed' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


    }
}
