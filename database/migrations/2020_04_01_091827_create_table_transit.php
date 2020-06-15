<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transit', function (Blueprint $table) {
        $table->mediumIncrements('id_transit');
        $table->string('field_transit', 400);
           $table->smallInteger('id_cordem');
              $table->smallInteger('id_cordre');
                   $table->boolean('confirmed')->nullable();

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
        Schema::dropIfExists('transit');
    }
}
