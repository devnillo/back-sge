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
        Schema::create('salas_aulas', function (Blueprint $table) {
            $table->id();
            $table->string('qtd_salas_utilizadas_predio_escolar', 4)->nullable();
            $table->string('qtd_salas_utilizadas_fora_predio', 4);
            $table->string('qtd_salas_climatizadas', 4);
            $table->string('qtd_salas_acessiveis_pcd', 4);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas_aulas');
    }
};
