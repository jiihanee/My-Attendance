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
        Schema::create('seances', function (Blueprint $table) {
            $table->id('ID_Seance');
            
            $table->unsignedBigInteger('ID_Matiere');
            $table->foreign('ID_Matiere') 
            ->references('ID_Matiere')
            ->on('matieres')
            ->constrained('matieres')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->time('Heure');
            $table->integer('Jour');
            $table->string('Type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
