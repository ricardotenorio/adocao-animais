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
            $table->date('finalizada_em')->nullable();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('animal_id')->constrained()->onDelete('cascade');
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
