<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warframes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('firstAbility');
            $table->string('secondAbility');
            $table->string('thirdAbility');
            $table->string('fourthAbility');
            $table->string('sex');
            $table->string('health')->nullable();
            $table->string('shields')->nullable();
            $table->string('armor')->nullable();
            $table->string('energy')->nullable();
            $table->string('initialEnergy')->nullable();
            $table->string('auraPolarity')->nullable();            
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
        Schema::dropIfExists('warframes');
    }
};
