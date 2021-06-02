<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerDetail', function (Blueprint $table) {
            $table->BigInteger('RegisterID')->unsigned();
            $table->integer('SectionNo');
            $table->string('ClassCode', 7);
            $table->string('Grade', 3)->nullable();

            $table->primary(['RegisterID', 'SectionNo', 'ClassCode']);

            $table->foreign('RegisterID')->references('RegisterID')->on('register');
            $table->foreign('SectionNo')->references('SectionNo')->on('classSec');
            $table->foreign('ClassCode')->references('ClassCode')->on('classSec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registerDetail');
    }
}
