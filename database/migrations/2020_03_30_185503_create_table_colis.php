<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableColis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colis', function (Blueprint $table) {

            $table->bigIncrements('id_colis');
            $table->string('nom_client',100);
            $table->string('code_bar',15);
            $table->string('adresse',255);
            $table->string('wilaya', 100);
            $table->smallInteger('phone');
            $table->smallInteger('id_com');
            $table->string('commune');
            $table->mediumInteger('price');
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
        Schema::dropIfExists('colis');
    }
}
