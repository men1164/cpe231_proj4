<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tchUser', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('FirstName', 60);
            $table->string('LastName', 60);
            $table->date('BirthDate');
            $table->char('Gender', 1);
            $table->bigInteger('CitizenID');
            $table->text('Email');
            $table->text('Personal_email');
            $table->text('Grad_from');
            $table->string('Grad_degree');
            $table->bigInteger('DepartmentID')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tchUser');
    }
}
