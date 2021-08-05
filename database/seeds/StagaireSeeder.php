<?php

use App\Etudiant;
use App\Stagaire;
use Illuminate\Database\Seeder;

class StagaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $stagaires1=[
            [
                'id'=> '1',
                'etudiant_id'=>'1',
                'groupe_id'=>'13'
            ],
           
          
            ];
            Stagaire::insert($stagaires1);

            // $etudiants=Etudiant::where('niveau_id',2)->where('id',1)->get();
            // foreach ($etudiants as  $etudiant) {
            //     $stagaires['etudiant_id']=$etudiant->id;
            //     Stagaire::insert($stagaires);

            // }
            // sync stages with stagairin      Stagaire::insert($stagaires);
            $stagaires=Stagaire::all();
            foreach ($stagaires as $stagaire) {
                $stagaire->stages()->attach([1 ,2 ,3 ,4 ,]);
            }
    }
}
