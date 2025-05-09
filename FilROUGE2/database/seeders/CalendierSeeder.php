<?php

namespace Database\Seeders;

use App\Models\Calendrier;
use App\Models\Cultures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $calendriers = [
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de carottes',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Irrigation des fraises',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Récolte des pommes',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de maïs',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de salade',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de haricots',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de courgettes',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de betteraves',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de tournesols',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de choux',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de concombres',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation d\'aubergines',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de poivrons',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de patates douces',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis d\'épinards',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de brocolis',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de céleri',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation d\'artichauts',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de radis',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation d\'oignons',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Semis de persil',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1582284540020-8acbe03f4924',
                'name' => 'Plantation de thym',
                'id_agriculteur' => 3,
                'etapes' => 'Semis'
            ]
        ];


    foreach($calendriers as  $calendrier)
    {
            Cultures::create($calendrier);

    };

    }





}
