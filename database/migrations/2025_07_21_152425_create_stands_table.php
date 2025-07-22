<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Fichier: ..._create_stands_table.php

    public function up(): void
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('status')->default('en_attente'); // 'en_attente', 'approuve', 'rejete'

            // Clé étrangère pour lier le stand à un utilisateur (l'exposant)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Clé étrangère pour lier le stand à une catégorie
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
