<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('libelle');
            $table->string('adresse');
            $table->Integer('tel');
            $table->string('fax');
            $table->string('email');
            $table->Integer('code_postal');
            $table->string('registre_commercial');
            $table->string('matricule_fiscal');
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
        Schema::dropIfExists('societes');
    }
}
