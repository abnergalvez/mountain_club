<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('dni')->nullable();
            $table->string('profession')->nullable();
            $table->string('phone')->nullable();
            $table->string('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->text('diseases')->nullable();
            $table->text('lesions')->nullable();
            $table->text('experience')->nullable();
            $table->text('training')->nullable();
            $table->text('own_equipment')->nullable();
            $table->text('club_position')->nullable();
            $table->string('role');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
