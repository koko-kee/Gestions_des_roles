<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Roles::create([

            "name" => "admin"
        ]);

        Roles::create([

            "name" => "auteur"
        ]);

        Roles::create([

            "name" => "utilisateur"
        ]);
    }
}
