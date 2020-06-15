<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFiche extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche', function (Blueprint $table) {
                  $table->mediumIncrements('id_fiche');
                    $table->string('nom_fiche', 100);
                     $table->smallInteger('id_liv');
                     $table->smallInteger('id_cord');
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
        Schema::dropIfExists('fiche');
    }
}
