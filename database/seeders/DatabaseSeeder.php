<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Exécute les seeders de la base de données.
     */
    public function run(): void
    {
        // Appelle les seeders spécifiés pour remplir la base de données
        $this->call([
            CategorySeeder::class, // Seeder pour les catégories
            TagSeeder::class, // Seeder pour les tags
            PostSeeder::class, // Seeder pour les posts
        ]);
    }
}
