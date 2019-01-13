<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_representant');
            $table->string('nom')->unique();
            $table->boolean('statut');
            $table->string('voirie',255);
            $table->string('ville',255);
            $table->string('code_postal',5);            
            $table->string('siret')->nullable();
            $table->integer('effectif')->nullable();
            $table->primary('id');
            $table->foreign('id_representant')->references('id')->on('users');
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
        Schema::dropIfExists('structure');
    }
}
