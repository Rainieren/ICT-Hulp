<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
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
        DB::table('roles')->insert([
            'role_name' => 'User',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('roles')->insert([
           'role_name' => 'Administrator',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'role_name' => 'Moderator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('roles')->insert([
           'role_name' => 'Company',
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
    }
}
