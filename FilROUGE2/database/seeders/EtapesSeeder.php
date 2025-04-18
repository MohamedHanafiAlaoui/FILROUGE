<?php

namespace Database\Seeders;

use App\Models\Etapes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtapesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Etapes=['Choix de la culture','Préparation du sol','Semis/Plantation','Irrigation','Traitements et entretien', 'Floraison et fructification','Récolte','Post-récolte'];

        foreach($Etapes as  $Etape)
        {
            Etapes::create(['name'=>$Etape]);

        }
        
    }
}
