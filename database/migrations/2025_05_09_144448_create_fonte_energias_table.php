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
        Schema::create('fonte_energias', function (Blueprint $table) {
            $table->id();
            $table->char('energia_rede_publica', 1);
            $table->char('energia_gerador_combustivel_fossil', 1);
            $table->char('energia_renergia_renovavel_ou_alternativaede_publica', 1);
            $table->char('energia_nao_ha', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fonte_energias');
    }
};
