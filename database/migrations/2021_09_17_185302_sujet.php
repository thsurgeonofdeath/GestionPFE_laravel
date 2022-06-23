<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sujet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->string('titre',255);
            $table->string('description',255);          
            $table->string('raport');          
            $table->foreignId('type_sujet_id') ->constrained('type_sujet');            
            $table->integer('niveau');
            $table->string('email')->unique();
            $table->boolean('validation')->nullable();
            $table->text('phone');
            $table->foreignId('encadrant_id')->nullable()->constrained('users'); 
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
        Schema::dropIfExists('sujets');
    }
}
