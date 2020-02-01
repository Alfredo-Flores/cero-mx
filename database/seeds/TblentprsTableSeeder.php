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
            1 => 
            array (
                'idnentprs' => 2,
                'uuid' => '123496b0-ea62-4303-8b4d-9c3782e6e094',
                'idnentusr' => 2,
                'nomentprs' => 'diego alonso',
                'prmaplprs' => 'Cavazos',
                'sgnaplprs' => 'Alvarado',
                'crpentprs' => 'CAAD840903HNLVLG04',
                'rfcentprs' => 'CAAD840903C55',
                'emllbrprs' => 'naranjeroloma1@hotmail.com',
                'emlprsprs' => 'cavazos_diego@hotmail.com',
                'ncnentprs' => 'Mexicano',
                'pasentprs' => 'Mexico',
                'ententprs' => 'Durango',
                'mncentprs' => 'durango',
                'lclentprs' => 'COLINAS DEL SALTITO',
                'dmcentprs' => 'AV. MIMBRES #321',
                'cdgpstprs' => '34105',
                'tlffijprs' => '6181300765',
                'tlfmvlprs' => '6181340837',
                'fotentprs' => '123496b0-ea62-4303-8b4d-9c3782e6e094/',
                'tipentprs' => '1',
                'created_at' => '2020-01-30 14:07:25',
                'updated_at' => '2020-01-30 14:07:25',
            ),
        ));
        
        
    }
}