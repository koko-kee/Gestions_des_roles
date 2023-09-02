<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([

            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')

        ]);
    
        $auteur = User::create([

            'name' => 'auteur',
            'email' => 'auteur@auteur.com',
            'password' => Hash::make('password')

        ]);
    
        $utilisateur = User::create([
            'name' => 'utilisateur',
            'email' => 'utilisateur@utilisateur.com',
            'password' => Hash::make('password')
        ]);
    
        $admin->roles()->attach([1,3]);
        $auteur->roles()->attach([2,3]);
        $utilisateur->roles()->attach([3]);
    }
}    