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
        Schema::create('etape_techniques', function (Blueprint $table) {
            $table->id();
            $table->string('nameetape');
            $table->text('descriptionetape')->nullable();
            $table->string('duree_estimee')->nullable();
            $table->foreignId('id_FichesExplicatives')
                  ->constrained('fiches_explicatives')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etape_techniques');
    }
};
