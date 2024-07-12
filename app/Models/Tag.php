<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Définition de la relation entre les tags et les posts
    public function posts(): BelongsToMany
    {
        // Un tag peut être associé à plusieurs posts
        return $this->belongsToMany(Post::class);
    }
}
