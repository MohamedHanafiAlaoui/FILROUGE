<?php

namespace Database\Seeders;

use App\Models\Calendrier;
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
                'image' => 'images/calendrier1.jpg',
                'name' => 'Plantation de blé',
                'id_agriculteur' => 3,
                'etapes' => '1'
            ],
            [
                'image' => 'images/calendrier2.jpg',
                'name' => 'Irrigation du maïs',
                'id_agriculteur' =>3,
                'etapes' => '2'
            ],
            [
                'image' => 'images/calendrier3.jpg',
                'name' => 'Récolte des olives',
                'id_agriculteur' =>3,
                'etapes' => '3'
            ],
            [
                'image' => 'images/calendrier4.jpg',
                'name' => 'Fertilisation des tomates',
                'id_agriculteur' =>3,
                'etapes' => '1'
            ],
            [
                'image' => 'images/calendrier5.jpg',
                'name' => 'Protection contre les parasites',
                'id_agriculteur' => 6,
                'etapes' => '2'
            ],
        ];
    foreach($calendriers as  $calendrier)
    {
        Calendrier::create($calendrier);

    };

    }





}
