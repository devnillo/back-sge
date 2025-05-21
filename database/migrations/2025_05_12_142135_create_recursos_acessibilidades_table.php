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
        Schema::create('recursos_acessibilidades', function (Blueprint $table) {
            $table->id();
            $table->char('acess_corrimao_guarda_corpos', 1);
            $table->char('acess_elevador', 1);
            $table->char('acess_pisos_tateis', 1);
            $table->char('acess_portas_vao_80cm', 1);
            $table->char('acess_rampas', 1);
            $table->char('acess_sinalizacao_luminosa', 1);
            $table->char('acess_sinalizacao_sonora', 1);
            $table->char('acess_sinalizacao_tatil', 1);
            $table->char('acess_sinalizacao_visual', 1);
            $table->char('acess_nenhum_recurso_listado', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos_acessibilidades');
    }
};
