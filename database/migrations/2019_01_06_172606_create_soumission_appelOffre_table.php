<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoumissionAppelOffreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soumission_appelOffre', function (Blueprint $table) {
            $table->uuid('id_appelOffre');
            $table->uuid('id_soumissionnaire');
            $table->foreign('id_soumissionnaire')->references('id')->on('users');
            $table->foreign('id_appelOffre')->references('id')->on('appel_offre');
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
        Schema::dropIfExists('soumission_a_o');
    }
}
