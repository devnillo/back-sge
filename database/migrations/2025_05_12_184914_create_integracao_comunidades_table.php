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
        Schema::create('integracao_comunidades', function (Blueprint $table) {
            $table->id();
            $table->char('possui_comunicacao_digital', 1)->nullable();
            $table->char('compartilha_espaco_comunidade', 1)->nullable();
            $table->char('usa_espacos_entorno_para_atividades', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integracao_comunidades');
    }
};
