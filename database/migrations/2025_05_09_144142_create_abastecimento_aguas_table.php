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
        Schema::create('abastecimento_aguas', function (Blueprint $table) {
            $table->id();
            $table->char('fornece_agua_potavel', 1);
            
            $table->char('agua_rede_publica', 1);
            $table->char('agua_poco_artesiano', 1);
            $table->char('agua_cacimba_cisterna_poco', 1);
            $table->char('agua_fonte_rio_igarape_riacho_corrego', 1);
            $table->char('agua_carro_pipa', 1);
            $table->char('agua_nao_ha_abastecimento', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abastecimento_aguas');
    }
};
