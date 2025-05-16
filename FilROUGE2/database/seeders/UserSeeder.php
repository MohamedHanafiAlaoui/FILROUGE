<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ["name" => "Ali Hassan", "email" => "ali.hassan@example.com", "password" => "Pass123!", "id_role" => 1],
            ["name" => "Fatima Zahra", "email" => "fatima.zahra@example.com", "password" => "SecurePass1", "id_role" => 2],
            ["name" => "Omar Khalid", "email" => "omar.khalid@example.com", "password" => "StrongPass!", "id_role" => 3],
            ["name" => "Nora Yassine", "email" => "nora.yassine@example.com", "password" => "MyPass123!", "id_role" => 2],
            ["name" => "Mohamed Amine", "email" => "mohamed.amine@example.com", "password" => "Amine2025!", "id_role" => 2],
            ["name" => "Samira Bouchra", "email" => "samira.bouchra@example.com", "password" => "Samira@2025", "id_role" => 3],
            ["name" => "Karim Loukili", "email" => "karim.loukili@example.com", "password" => "Karim#Pass", "id_role" => 2],
            ["name" => "Hind Elhaj", "email" => "hind.elhaj@example.com", "password" => "Hind!123", "id_role" => 2],
            ["name" => "Tariq Benjelloun", "email" => "tariq.benjelloun@example.com", "password" => "TariqPass!", "id_role" => 3],
            ["name" => "Layla Saidi", "email" => "layla.saidi@example.com", "password" => "Layla@789", "id_role" => 2],
            ["name" => "Youssef Chafiq", "email" => "youssef.chafiq@example.com", "password" => "Youssef2025!", "id_role" => 2],
            ["name" => "Rania Idrissi", "email" => "rania.idrissi@example.com", "password" => "Rania@Pass", "id_role" => 3],
            ["name" => "Adil Fikri", "email" => "adil.fikri@example.com", "password" => "AdilPass!22", "id_role" => 3],
            ["name" => "Meriem Bouzid", "email" => "meriem.bouzid@example.com", "password" => "Meriem#456", "id_role" => 2],
            ["name" => "Said Othmani", "email" => "said.othmani@example.com", "password" => "Said!2025", "id_role" => 3],
            ["name" => "Imane Berrada", "email" => "imane.berrada@example.com", "password" => "Imane@Pass", "id_role" => 2],
            ["name" => "Nabil Hafidi", "email" => "nabil.hafidi@example.com", "password" => "Nabil2025!", "id_role" => 2],
            ["name" => "Salma Jilali", "email" => "salma.jilali@example.com", "password" => "Salma!Pass", "id_role" => 3],
            ["name" => "Hicham Dami", "email" => "hicham.dami@example.com", "password" => "Hicham@2025", "id_role" => 3],
            ["name" => "Zineb Moulay", "email" => "zineb.moulay@example.com", "password" => "Zineb#Pass", "id_role" => 2]
        ];
        

          foreach ($users as $user)
          {
            User::create($user);
          };


        //
    }
}
