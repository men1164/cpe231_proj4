<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('FirstName', 60);
            $table->string('LastName', 60);
            $table->date('BirthDate');
            $table->char('Gender', 1);
            $table->bigInteger('CitizenID');
            $table->text('Email');
            $table->text('Personal_email');
            $table->string('Degree', 60);
            $table->bigInteger('ProgramID')->unsigned()->nullable();
            $table->char('Room', 1);
            $table->date('DateStarted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
