<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('area_id');
            $table->string('first_name',50);
            $table->string('second_name',50)->nullable();
            $table->string('nickname',50)->nullable();
            $table->string('first_lastname',50)->nullable();
            $table->string('second_lastname',50)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
