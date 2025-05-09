<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CalendierSeeder::class);
        $this->call(EtapesSeeder::class);
        $this->call(CalendarEntrySeeder::class);
        $this->call(SignalerSeeder::class);
        $this->call(FichesExplicativesSeeder::class);
    }
}
