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
        Schema::create('presences', function (Blueprint $table) {
            $table->id('ID_Presence');

            $table->unsignedBigInteger('ID_Seance');
            $table->foreign('ID_Seance')
            ->references('ID_Seance')
            ->on('seances')
            ->constrained('seances')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('ID_Eleve');
            $table->foreign('ID_Eleve')
            ->references('ID_Eleve')
            ->on('eleves')
            ->constrained('eleves')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->boolean('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
