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
        // Modifie la table 'posts'
        Schema::table('posts', function (Blueprint $table) {
            // Ajoute une colonne 'category_id' après la colonne 'id', qui peut être nulle, et ajoute une contrainte de clé étrangère.
            // Si une catégorie est supprimée, le 'category_id' devient nul (nullOnDelete).
            $table->foreignId('category_id')->after('id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        // Modifie la table 'posts'
        Schema::table('posts', function (Blueprint $table) {
            // Supprime la contrainte de clé étrangère sur la colonne 'category_id'
            $table->dropForeign(['category_id']);
            // Supprime la colonne 'category_id'
            $table->dropColumn('category_id');
        });
    }
};
