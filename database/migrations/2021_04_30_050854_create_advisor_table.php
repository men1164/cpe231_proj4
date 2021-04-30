<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisor', function (Blueprint $table) {
            $table->bigInteger('std_id')->unsigned();
            $table->bigInteger('tch_id')->unsigned();

            $table->primary(['std_id', 'tch_id']);

            $table->foreign('std_id')->references('id')->on('users');
            $table->foreign('tch_id')->references('id')->on('tchUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advisor');
    }
}
