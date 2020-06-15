<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HubWilaya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_wilaya', function (Blueprint $table) {
            $table->smallInteger('id_wilaya')->unsigned();
            $table->smallInteger('id_hub')->unsigned();
            $table->primary(['id_wilaya', 'id_hub']);
            $table->foreign('id_wilaya')->references('id_wilaya')->on('wilaya')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_hub')->references('id_hub')->on('hubs')->onDelete('cascade')->onUpdate('cascade');
  
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
  
        Schema::dropIfExists('hub_wilaya');

    }
}
