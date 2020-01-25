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
                'uuid' => '805a5231-9797-4f4c-8b35-41ef064a32c4',
                'idnentusr' => 1,
                'nomentprs' => 'Alfredo',
                'prmaplprs' => 'Flores',
                'sgnaplprs' => 'Garcia',
                'crpentprs' => 'undefined',
                'rfcentprs' => 'FOGA000405AV4',
                'emllbrprs' => 'Alfredo@gmail.com',
                'emlprsprs' => 'Alfredo@gmail.com',
                'ncnentprs' => 'Mexicano',
                'pasentprs' => 'Mexico',
                'ententprs' => 'Durango',
                'mncentprs' => 'Durango',
                'lclentprs' => 'Universal',
                'dmcentprs' => 'Tuxpan 107',
                'cdgpstprs' => '35165',
                'tlffijprs' => '6181087527',
                'tlfmvlprs' => '6181087527',
                'fotentprs' => '805a5231-9797-4f4c-8b35-41ef064a32c4/',
                'tipentprs' => '1',
                'created_at' => '2020-01-25 19:23:04',
                'updated_at' => '2020-01-25 19:23:04',
            ),
            1 => 
            array (
                'idnentprs' => 2,
                'uuid' => '7720afdb-4842-4192-b6e0-2af3189a0b01',
                'idnentusr' => 2,
                'nomentprs' => 'Ezequiel',
                'prmaplprs' => 'Olivas',
                'sgnaplprs' => 'Melendez',
                'crpentprs' => 'undefined',
                'rfcentprs' => 'FOGA000405AV4',
                'emllbrprs' => 'q@q.com',
                'emlprsprs' => 'q@q.com',
                'ncnentprs' => 'Mexicano',
                'pasentprs' => 'Mexico',
                'ententprs' => 'Durango',
                'mncentprs' => 'Durango',
                'lclentprs' => 'Centro',
                'dmcentprs' => 'Negrete #400',
                'cdgpstprs' => '34000',
                'tlffijprs' => '6181234728',
                'tlfmvlprs' => '6186213734',
                'fotentprs' => '7720afdb-4842-4192-b6e0-2af3189a0b01/',
                'tipentprs' => '2',
                'created_at' => '2020-01-25 19:26:51',
                'updated_at' => '2020-01-25 19:26:51',
            ),
        ));
        
        
    }
}