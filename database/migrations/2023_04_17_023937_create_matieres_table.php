<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id('ID_Matiere');
            $table->string('Nom');

            $table->unsignedBigInteger('ID_Enseignant');
            $table->foreign('ID_Enseignant')
            ->references('ID_Enseignant')
            ->on('enseignants')
            ->constrained('enseignants')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();

            $table->unsignedBigInteger('ID_Classe');
            $table->foreign('ID_Classe')
            ->references('ID_Classe')
            ->on('classes')
            ->constrained('classes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
