<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stades_cultures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_culture');
            $table->unsignedBigInteger('id_etapes');
            $table->string('description');
            

            $table->timestamps();

            $table->foreign('id_culture')->references('id')->on('cultures')->onDelete('cascade');
            $table->foreign('id_etapes')->references('id')->on('etapes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stades_cultures');
    }
};
