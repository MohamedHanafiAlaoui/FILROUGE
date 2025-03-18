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
        Schema::create('solutions_adaptees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_agriculteur');
            $table->unsignedBigInteger('id_agricole');
            $table->string('name');

            $table->timestamps();

            $table->foreign('id_agriculteur')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_agricole')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions_adaptees');
    }
};
