<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Exécute les seeds de la base de données.
     */
    public function run(): void
    {
        // Récupère toutes les catégories et tous les tags existants
        $categories = Category::all();
        $tags = Tag::all();

        // Utilise la factory pour créer 20 instances de Post
        Post::factory(20)

            // Utilise une séquence pour définir dynamiquement la clé étrangère 'category_id'
            ->sequence(fn () => [
                'category_id' => $categories->random(),  // Sélectionne aléatoirement une catégorie
            ])

            // Crée les instances de Post
            ->create()

            // Associe aléatoirement entre 0 et 3 tags à chaque post créé
            ->each(fn ($post) => $post->tags()->attach($tags->random(rand(0, 3))));
    }
}
