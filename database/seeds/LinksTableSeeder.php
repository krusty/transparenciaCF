<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('links')->delete();
        
        \DB::table('links')->insert(array (
            0 => 
            array (
                'id' => 1,
                'display' => 'Links',
                'url' => 'Link',
                'created_at' => '2016-02-16 22:20:38',
                'updated_at' => '2016-02-17 01:20:38',
                'main' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'display' => 'Grupos',
                'url' => 'Group',
                'created_at' => '2016-02-03 00:14:52',
                'updated_at' => '2016-02-03 00:14:52',
                'main' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'display' => 'Categorías',
                'url' => 'Category',
                'created_at' => '2016-02-03 00:15:12',
                'updated_at' => '2016-02-03 00:15:12',
                'main' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'display' => 'Personas',
                'url' => 'People',
                'created_at' => '2016-02-03 00:15:20',
                'updated_at' => '2016-02-03 00:15:20',
                'main' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'display' => 'Movimientos',
                'url' => 'Movement',
                'created_at' => '2016-02-03 00:15:58',
                'updated_at' => '2016-02-03 00:15:58',
                'main' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'display' => 'Areas',
                'url' => 'Area',
                'created_at' => '2016-02-16 23:46:32',
                'updated_at' => '2016-02-16 23:46:32',
                'main' => NULL,
            ),
        ));
        
        
    }
}
