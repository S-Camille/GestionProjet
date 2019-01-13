<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExComptableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercice_comptable', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_entreprise');
            $table->string('annee',4);
            $table->integer('chiffre');
            $table->integer('effectif');
            $table->string('lien_urssaf',255);
            $table->string('lien_fiscale',255);
            $table->string('lien_assurance',255);
            $table->string('lien_qualifPro',255);
            $table->primary('id');
            $table->foreign('id_entreprise')->references('id')->on('entreprise');
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
        Schema::dropIfExists('ex_comptable');
    }
}
