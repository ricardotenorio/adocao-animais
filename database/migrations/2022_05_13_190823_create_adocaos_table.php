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
        Schema::create('adocaos', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('finalizada_em');

            $table->bigInteger('user_id');
            $table->bigInteger('animal_id');
            $table->timestamps();

            $table->index(['user_id', 'animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adocaos');
    }
};
