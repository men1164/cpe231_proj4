<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherInClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TeacherInClass', function (Blueprint $table) {
            $table->integer('SectionNo');
            $table->string('ClassCode', 7);
            $table->BigInteger('tchID')->unsigned();

            $table->primary(['SectionNo', 'ClassCode', 'tchID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TeacherInClass');
    }
}
