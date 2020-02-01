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
                'uuid' => '123496b0-ea62-4303-8b4d-9c3782e6e094',
                'idnentprs' => 2,
                'namentemp' => 'El Naranjero Lomas',
                'logentemp' => '123496b0-ea62-4303-8b4d-9c3782e6e094/logo/',
                'drcentemp' => 'BLVD ARMANDO DEL CASTILLO FRANCO LOTE 25 A Y B',
                'lclentemp' => 'LOMAS DEL PARQUE',
                'mncentemp' => 'DURANGO',
                'ententemp' => 'Mexicano',
                'pasentorg' => 'Mexico',
                'cdgpstemp' => 34100,
                'cdgtrbemp' => 'CAAB810511V98',
                'girentemp' => 'SUPERMERCADO',
                'tlfofiemp' => '6181300765',
                'emlofiemp' => 'naranjerolomas1@hotmail.com',
                'desaliemp' => 'FRUTAS Y VERDURAS',
                'candonemp' => '10',
                'temconemp' => NULL,
                'horentemp' => '11:00',
                'detentemo' => 'DIRIGIRSE CON DIEGO ALONSO CAVAZOS ALVARADO',
                'created_at' => '2020-01-30 14:07:25',
                'updated_at' => '2020-01-30 14:07:25',
                'hstentemp' => NULL,
            ),
        ));
        
        
    }
}