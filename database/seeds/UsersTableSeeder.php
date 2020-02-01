<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'uuid' => 'dedc4444-9723-3316-a4a6-9e475f84fd84',
                'email' => 'mujeres.oficiosvarios@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zW/m7EucFcrA5B/hW9IwbOAcR5SA9g9ufzNh8il6aa.E1WR295Xca',
                'created_at' => '2020-01-29 17:28:44',
                'updated_at' => '2020-01-29 17:28:44',
                'remember_token' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'uuid' => 'c94cc982-9fda-3dca-a728-c208b13700e4',
                'email' => 'naranjerolomas1@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$tTWEn9jkS0BD2/jqwlFZ/uzVBZf9vvaqKgOayV8GotLL1KaQWQ1cq',
                'created_at' => '2020-01-30 13:55:52',
                'updated_at' => '2020-01-30 13:55:52',
                'remember_token' => NULL,
            ),
        ));
        
        
    }
}