<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('coordinators_guides')->nullable();
            $table->string('security_managers')->nullable();
            $table->string('type')->nullable();
            $table->string('place')->nullable();
            $table->text('description')->nullable();
            $table->text('learning')->nullable();
            $table->text('goals')->nullable();
            $table->dateTime('init_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
