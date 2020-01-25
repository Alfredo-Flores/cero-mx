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
                'uuid' => '7720afdb-4842-4192-b6e0-2af3189a0b01',
                'idnentprs' => 2,
                'sgmentorg' => 'Donatario',
                'bnfentorg' => '50',
                'nmbentorg' => 'Frida Kaloh',
                'logentorg' => '7720afdb-4842-4192-b6e0-2af3189a0b01/',
                'rfcentorg' => 'FOGA000405AV4',
                'dmcentorg' => 'Negrete #501',
                'lclentorg' => 'Centro',
                'mncentorg' => 'Durango',
                'etdentorg' => 'Mexicano',
                'pasentorg' => 'Mexico',
                'cdgpstorg' => '34165',
                'tlffcnorg' => '6180000234',
                'emlfcnorg' => 'Frida@gmail.com',
                'plntrborg' => '7720afdb-4842-4192-b6e0-2af3189a0b01/',
                'actcnsorg' => '7720afdb-4842-4192-b6e0-2af3189a0b01/',
                'cnsdntorg' => '7720afdb-4842-4192-b6e0-2af3189a0b01/',
                'created_at' => '2020-01-25 19:26:51',
                'updated_at' => '2020-01-25 19:26:51',
                'hstentorg' => NULL,
            ),
        ));
        
        
    }
}