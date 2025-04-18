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
        Schema::create('signalers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->unsignedBigInteger('id_Calendar');


            $table->timestamps();

            $table->foreign('id_Calendar')->references('id')->on('calendriers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signalers');
    }
};
