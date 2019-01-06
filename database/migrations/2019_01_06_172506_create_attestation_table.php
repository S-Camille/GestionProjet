<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttestationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestation', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_entreprise');
            $table->string('type',255);//DC 1/2 ....
            $table->boolean('is_valid')->default(false);
            $table->string('lien',255);
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
        Schema::dropIfExists('attestation');
    }
}
