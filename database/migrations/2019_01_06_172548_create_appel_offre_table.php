<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppelOffreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appel_offre', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_commanditaire');
            $table->string('titre,255');
            $table->text('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->primary('id');
            $table->foreign('id_commanditaire')->references('id')->on('entreprise');
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
        Schema::dropIfExists('appel_offre');
    }
}
