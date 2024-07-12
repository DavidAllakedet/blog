<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Exécute les seeds de la base de données.
     */
    public function run(): void
    {
        // Crée une collection de catégories à insérer dans la base de données
        $categories = collect(['Livre', 'Jeu-video', 'Film']);

        // Parcourt chaque élément de la collection et crée une nouvelle catégorie
        $categories->each(fn ($category) => Category::create([
            'name' => $category,  // Définit le nom de la catégorie
            'slug' => Str::slug($category),  // Génère un slug à partir du nom de la catégorie
        ]));
    }
}
