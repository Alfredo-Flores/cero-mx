<?php

use Illuminate\Database\Seeder;

class TblentprsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tblentprs')->delete();
        
        \DB::table('tblentprs')->insert(array (
            0 => 
            array (
                'idnentprs' => 1,
                'uuid' => '618660fc-99fd-499a-a126-9af206ad1bf5',
                'idnentusr' => 1,
                'nomentprs' => 'Raziel Guadalupe',
                'prmaplprs' => 'Hernandez',
                'sgnaplprs' => 'Fernandez',
                'crpentprs' => 'undefined',
                'rfcentprs' => 'HEFR951212GC8',
                'emllbrprs' => 'raziel22hdz@gmail.com',
                'emlprsprs' => 'raziel22hdz@gmail.com',
                'ncnentprs' => 'Mexicano',
                'pasentprs' => 'Mexico',
                'ententprs' => 'Durango',
                'mncentprs' => 'Durango',
                'lclentprs' => 'Fraccionamiento Nuevo Durango 1',
                'dmcentprs' => 'Calle Armonia #504',
                'cdgpstprs' => '34162',
                'tlffijprs' => '6184553457',
                'tlfmvlprs' => '6182115783',
                'fotentprs' => '618660fc-99fd-499a-a126-9af206ad1bf5/',
                'tipentprs' => '2',
                'created_at' => '2020-01-29 17:54:25',
                'updated_at' => '2020-01-29 17:54:25',
            ),
        ));
        
        
    }
}