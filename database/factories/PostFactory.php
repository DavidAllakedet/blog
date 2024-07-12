<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories.Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Génère un titre unique et une chaîne de contenu aléatoires
        $title = fake()->unique()->sentence;
        $content = fake()->paragraphs(asText: true);
        // Génère une date de création aléatoire entre aujourd'hui et un an en arrière
        $created_at = fake()->dateTimeBetween('-1 year');

        // Retourne un tableau associatif représentant les attributs du modèle Post
        return [
            'title' => $title,
            // Génère un slug à partir du titre
            'slug' => Str::slug($title),
            // Génère un extrait du contenu, limité à 150 caractères
            'excerpt' => Str::limit($content, 150),
            'content' => $content,
            // Génère une URL d'image aléatoire pour la miniature
            'thumbnail' => fake()->imageUrl,
            // Définit les champs created_at et updated_at avec la même date aléatoire
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
