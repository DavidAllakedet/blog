<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


    // Méthode pour définir la relation entre les catégories et les posts
    public function posts(): HasMany
    {
        // Une catégorie peut avoir plusieurs posts
        return $this->hasMany(Post::class);
    }
}
