<?php

use Illuminate\Database\Seeder;

class TblentempTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tblentemp')->delete();
        
        \DB::table('tblentemp')->insert(array (
            0 => 
            array (
                'idnentemp' => 1,
                'uuid' => '805a5231-9797-4f4c-8b35-41ef064a32c4',
                'idnentprs' => 1,
                'namentemp' => 'El naranjo',
                'logentemp' => '805a5231-9797-4f4c-8b35-41ef064a32c4/logo/',
                'drcentemp' => 'Tuxpan 107',
                'lclentemp' => 'Universal',
                'mncentemp' => 'Durango',
                'ententemp' => 'Mexicano',
                'pasentorg' => 'Mexico',
                'cdgpstemp' => 34165,
                'cdgtrbemp' => 'FOGA000405AV4',
                'girentemp' => 'Abarrotes',
                'tlfofiemp' => '6181087527',
                'emlofiemp' => 'Marisa@gmail.com',
                'desaliemp' => 'Frutas y verduras',
                'candonemp' => '50',
                'temconemp' => NULL,
                'horentemp' => NULL,
                'detentemo' => 'De preferencia llevar una camioneta para introducir rejillas',
                'created_at' => '2020-01-25 19:23:04',
                'updated_at' => '2020-01-25 19:23:04',
                'hstentemp' => NULL,
            ),
        ));
        
        
    }
}