<?php

use App\Admin;
use App\Encadrant;
use App\Secretaire;
use Illuminate\Database\Seeder;

class SecretaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Sectretaire
         */
        $secretaire=[
            [
            'id'=>1,
            'nom'=>'Abdo',
            'prenom'=>'secretaire',
            'service_id'=>'6',
            'created_at'     => '2021-04-15 19:13:32',
            'updated_at'     => '2021-04-15 19:13:32',

            ],
    ];
    Secretaire::insert($secretaire);

    /**
     * Encadrant
     */
    $encadrant=[
        [
            'id'=>1,
            'nom'=>'Mehdi',
            'prenom'=>'Encadrant',
            'service_id'=>'6',
            'created_at'     => '2021-04-15 19:13:32',
            'updated_at'     => '2021-04-15 19:13:32',

            ],
 
    ];
         Encadrant::insert($encadrant);


         /**
          * Admin
          */
        $admin=[
            [
                'id'=>1,
                'nom'=>'Adil',
                'prenom'=>'Admin',
                'created_at'     => '2021-04-15 19:13:32',
                'updated_at'     => '2021-04-15 19:13:32',
    
                ],
        ];
        Admin::insert($admin);

        
    }
}
