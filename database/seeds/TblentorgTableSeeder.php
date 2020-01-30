<?php

use Illuminate\Database\Seeder;

class TblentorgTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tblentorg')->delete();
        
        \DB::table('tblentorg')->insert(array (
            0 => 
            array (
                'idnentorg' => 1,
                'uuid' => '618660fc-99fd-499a-a126-9af206ad1bf5',
                'idnentprs' => 1,
                'sgmentorg' => 'Adultos mayores, madres solteras, personas con discapacidad, adolescentes y niños.',
                'bnfentorg' => '100',
                'nmbentorg' => 'Federación De Mujeres Trabajadoras de Oficios Varios A.C',
                'logentorg' => '618660fc-99fd-499a-a126-9af206ad1bf5/',
                'rfcentorg' => 'FMT041130SQ4',
                'dmcentorg' => 'Calle Laurel #124',
                'lclentorg' => 'colonia valle verde',
                'mncentorg' => 'Durango',
                'etdentorg' => 'Mexicano',
                'pasentorg' => 'Mexico',
                'cdgpstorg' => '34194',
                'tlffcnorg' => '6188260741',
                'emlfcnorg' => 'mujeres.oficiosvarios@hotmail.com',
                'plntrborg' => '618660fc-99fd-499a-a126-9af206ad1bf5/',
                'actcnsorg' => '618660fc-99fd-499a-a126-9af206ad1bf5/',
                'cnsdntorg' => '618660fc-99fd-499a-a126-9af206ad1bf5/',
                'created_at' => '2020-01-29 17:54:25',
                'updated_at' => '2020-01-29 17:54:25',
                'hstentorg' => NULL,
            ),
        ));
        
        
    }
}