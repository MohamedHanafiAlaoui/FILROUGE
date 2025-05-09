<?php

namespace Database\Seeders;


use App\Models\Stadesculture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalendarEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calendarEntries = [
            [
                'id_culture' => 1,
                'id_etapes' => 1,
                'description' => "tg ghth ghrhy",
            ],
            [
                'id_culture' => 1,
                'id_etapes' => 2,
                'description' => "Stage 2 description - details on what happens here",
            ],
            [
                'id_culture' => 1,
                'id_etapes' => 3,
                'description' => "Stage 3 description - continuing the journey",
            ],
            [
                'id_culture' => 1,
                'id_etapes' => 4,
                'description' => "Stage 4 description - the next phase",
            ],
            [
                'id_culture' => 2,
                'id_etapes' => 5,
                'description' => "Stage 5 description - a significant milestone",
            ],
            [
                'id_culture' => 2,
                'id_etapes' => 6,
                'description' => "Stage 6 description - preparation for the next event",
            ],
            [
                'id_culture' => 2,
                'id_etapes' => 7,
                'description' => "Stage 7 description - a turning point in the process",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 8,
                'description' => "Stage 8 description - the climax of the event",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 5,
                'description' => "Stage 9 description - reflecting on the journey so far",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 1,
                'description' => "Stage 10 description - final preparations",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 1,
                'description' => "Stage 11 description - the closing phase",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 1,
                'description' => "Stage 12 description - conclusion and summary",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 3,
                'description' => "Stage 13 description - post-event activities",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 4,
                'description' => "Stage 14 description - follow-up steps",
            ],
            [
                'id_culture' => 3,
                'id_etapes' => 5,
                'description' => "Stage 15 description - feedback and evaluation",
            ],
        ];


        foreach ($calendarEntries as $calendarEntrie) {
            Stadesculture::create($calendarEntrie);

        }
        ;



    }
}
