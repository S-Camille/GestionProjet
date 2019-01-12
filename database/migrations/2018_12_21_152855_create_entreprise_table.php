<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrepriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_gerant');
            $table->string('nom')->unique();
            $table->string('voirie',255);
            $table->string('ville',255);
            $table->string('code_postal',5);            
            $table->string('siret');
            $table->integer('effectif');
            $table->primary('id');
            $table->foreign('id_gerant')->references('id')->on('users');
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
        Schema::dropIfExists('entreprise');
    }
}
