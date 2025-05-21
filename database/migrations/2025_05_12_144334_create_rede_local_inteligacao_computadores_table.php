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
        Schema::create('rede_local_inteligacao_computadores', function (Blueprint $table) {
            $table->id();
            $table->char('rede_local_cabo', 1)->nullable();
            $table->char('rede_local_wireless', 1)->nullable();
            $table->char('rede_local_nao_ha', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rede_local_inteligacao_computadores');
    }
};
