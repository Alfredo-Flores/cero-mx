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
                'uuid' => 'ab04a442-5871-3a34-8c49-7854b9f3cd62',
                'email' => 'q@q.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SWWTEdsrDzBw2AbgbxTebOY3KQBF9Z4qfgXi/gP78Na2n8XM7EsB6',
                'created_at' => '2020-01-25 19:15:13',
                'updated_at' => '2020-01-25 19:15:13',
                'remember_token' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'uuid' => 'c7da29ed-1df3-35e8-9942-3f5b345c2d0c',
                'email' => 'w@w.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$/uQ.DMpKzkZX..xPjpAerON8NaD81iFKcR8818IIpOqcEAx3oc4N2',
                'created_at' => '2020-01-25 19:23:28',
                'updated_at' => '2020-01-25 19:23:28',
                'remember_token' => NULL,
            ),
        ));
        
        
    }
}