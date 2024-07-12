<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Exécute les seeds de la base de données.
     */
    public function run(): void
    {
        // Crée une collection de tags à insérer dans la base de données
        $tags = collect(['Romance', 'Action', 'Fantastique', 'Horreur', 'Drame', 'Epouvante', 'Policier', 'Fantaisie']);

        // Parcourt chaque élément de la collection et crée un nouveau tag
        $tags->each(fn ($tag) => Tag::create([
            'name' => $tag,  // Définit le nom du tag
            'slug' => Str::slug($tag),  // Génère un slug à partir du nom du tag
        ]));
    }
}
