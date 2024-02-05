<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('team')->nullable();
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('trade')->nullable();
            $table->string('position')->nullable();
            $table->string('edu')->nullable();
            $table->string('residence')->nullable();
            $table->string('house')->nullable();
            $table->string('postal')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('height_one')->nullable();
            $table->string('height_two')->nullable();
            $table->string('weight')->nullable();
            $table->string('allergy')->nullable();
            $table->string('parent')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('players');
    }
}
