<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        // Crée la table pivot 'post_tag' pour la relation many-to-many entre posts et tags
        Schema::create('post_tag', function (Blueprint $table) {
            // Colonne 'id' auto-incrémentée
            $table->id();
            // Colonne 'post_id' avec une contrainte de clé étrangère et suppression en cascade
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            // Colonne 'tag_id' avec une contrainte de clé étrangère et suppression en cascade
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            // Colonnes timestamps 'created_at' et 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        // Supprime la table 'post_tag' si elle existe
        Schema::dropIfExists('post_tag');
    }
};
