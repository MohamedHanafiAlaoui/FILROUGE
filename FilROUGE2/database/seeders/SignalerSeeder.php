<?php

namespace Database\Seeders;

use App\Models\Signaler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignalerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Signalers =  [
            [
                'image' => 'https://www.silencecapousse-chezvous.fr/media/images/28036/rectangle/w900/1698058123/tavelure.jpg',
                'name' => 'Tavelure du pommier',
                'id_culture' => 1,
                'description' => 'Maladie fongique causée par Venturia inaequalis, provoquant des taches noires sur feuilles et fruits'
            ],
            [
                'image' => 'https://www.lepotiron.fr/potiblog/wp-content/uploads/2010/02/puceron-lanigere-pommier-malade.jpg',
                'name' => 'Puceron lanigère du pommier',
                'id_culture' => 1,
                'description' => 'Insecte ravageur (Eriosoma lanigerum) formant des amas blancs cotonneux sur les branches'
            ],
            [
                'image' => 'https://www.compo.de/dam/jcr:3ce82492-db19-4efe-8de5-5517d53b7ac2/Rot-Weissflecken.jpg?x=36&y=40',
                'name' => 'Maladie des taches noires',
                'id_culture' => 2,
                'description' => 'Champignon Diplocarpon rosae affectant les rosacées, avec taches circulaires noires'
            ],
            [
                'image' => 'https://www.plantentuinmeise.be/cms_files/Image/Fusarium%20infection_4.jpg',
                'name' => 'Fusariose',
                'id_culture' => 3,
                'description' => 'Maladie vasculaire causée par Fusarium oxysporum, conduisant au flétrissement'
            ],
            [
                'image' => 'https://www.silencecapousse-chezvous.fr/media/images/28036/rectangle/w900/1698058123/tavelure.jpg',
                'name' => 'Mildiou de la tomate',
                'id_culture' => 4,
                'description' => 'Phytophthora infestans causant des taches huileuses et moisissures blanches'
            ],
            [
                'image' => 'https://www.lepotiron.fr/potiblog/wp-content/uploads/2010/02/puceron-lanigere-pommier-malade.jpg',
                'name' => 'Oïdium',
                'id_culture' => 5,
                'description' => 'Champignon formant un feutrage blanc poudreux sur les feuilles'
            ]
        ];

           foreach ($Signalers as $Signaler) {
                Signaler::create($Signaler);

        }
        ;
    }
}
