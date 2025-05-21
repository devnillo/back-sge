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
        Schema::create('orgaos_colegiados', function (Blueprint $table) {
            $table->id();
            $table->char('orgao_associacao_pais', 1);
            $table->char('orgao_associacao_pais_mestres', 1);
            $table->char('orgao_conselho_escolar', 1);
            $table->char('orgao_gremio_estudantil', 1);
            $table->char('orgao_outros', 1);
            $table->char('orgao_nenhum', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orgaos_colegiados');
    }
};
