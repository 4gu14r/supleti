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
        Schema::create('trechos', function (Blueprint $table) {
            $table->id();
            $table->date('data_referencia');
            $table->foreignId('uf_id')->constrained('ufs');
            $table->foreignId('rodovia_id')->constrained('rodovias');
            $table->float('quilometragem_inicial');
            $table->float('quilometragem_final');
            $table->json('geo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trechos');
    }
};
