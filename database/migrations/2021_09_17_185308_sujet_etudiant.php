<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SujetEtudiant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujet_etudiants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sujet_id') ->constrained('sujets');            
            $table->foreignId('etudiant_id') ->constrained('etudiants');            
            $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sujet_etudiants');
    }
}
