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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id('ID_Eleve');

            $table->unsignedBigInteger('ID_Parent');
            $table->foreign('ID_Parent')
            ->references('ID_Parent')
            ->on('parent_s')
            ->constrained('parent_s')
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
           
            $table->unsignedBigInteger('ID_Classe');
            $table->foreign('ID_Classe')
            ->references('ID_Classe')
            ->on('classes')
            ->constrained('classes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('CNE');
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('Date_De_Naissance');
           
          
            $table->string('Photo')->nullable(false);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
