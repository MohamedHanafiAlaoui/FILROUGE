<?php

namespace Database\Seeders;

use App\Models\CalendarEntry;
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
                'id_Calendar' => 1,
                'id_etapes' => 1,
                'description' => "tg ghth ghrhy", 
            ],
            [
                'id_Calendar' => 1,
                'id_etapes' => 2,
                'description' => "Stage 2 description - details on what happens here", 
            ],
            [
                'id_Calendar' => 1,
                'id_etapes' => 3,
                'description' => "Stage 3 description - continuing the journey", 
            ],
            [
                'id_Calendar' => 1,
                'id_etapes' => 4,
                'description' => "Stage 4 description - the next phase", 
            ],
            [
                'id_Calendar' => 2,
                'id_etapes' => 5,
                'description' => "Stage 5 description - a significant milestone", 
            ],
            [
                'id_Calendar' => 2,
                'id_etapes' => 6,
                'description' => "Stage 6 description - preparation for the next event", 
            ],
            [
                'id_Calendar' => 2,
                'id_etapes' => 7,
                'description' => "Stage 7 description - a turning point in the process", 
            ],
            [
                'id_Calendar' => 3,
                'id_etapes' => 8,
                'description' => "Stage 8 description - the climax of the event", 
            ],
            [
                'id_Calendar' => 3,
                'id_etapes' => 5,
                'description' => "Stage 9 description - reflecting on the journey so far", 
            ],
            [
                'id_Calendar' => 3,
                'id_etapes' => 1,
                'description' => "Stage 10 description - final preparations", 
            ],
            [
                'id_Calendar' => 4,
                'id_etapes' => 1,
                'description' => "Stage 11 description - the closing phase", 
            ],
            [
                'id_Calendar' => 4,
                'id_etapes' => 1,
                'description' => "Stage 12 description - conclusion and summary", 
            ],
            [
                'id_Calendar' => 4,
                'id_etapes' => 3,
                'description' => "Stage 13 description - post-event activities", 
            ],
            [
                'id_Calendar' => 5,
                'id_etapes' => 4,
                'description' => "Stage 14 description - follow-up steps", 
            ],
            [
                'id_Calendar' => 5,
                'id_etapes' => 5,
                'description' => "Stage 15 description - feedback and evaluation", 
            ],
        ];


        foreach($calendarEntries as  $calendarEntrie)
        {
            CalendarEntry::create($calendarEntrie);
    
        };


        
    }
}
