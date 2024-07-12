<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    // Les relations qui doivent être chargées par défaut avec le modèle
    protected $with = [
        'category',
        'tags'
    ];

    // Redéfinition de la clé de route pour les modèles Post, pour utiliser 'slug' au lieu de l'ID par défaut
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Définition de la relation entre les posts et les catégories
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Définition de la relation entre les posts et les tags
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
