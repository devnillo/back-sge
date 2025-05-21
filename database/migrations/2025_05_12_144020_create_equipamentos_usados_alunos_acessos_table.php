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
        Schema::create('equipamentos_usados_alunos_acessos', function (Blueprint $table) {
            $table->id();
            $table->char('internet_acesso_equipamentos_escola', 1)->nullable();
            $table->char('internet_acesso_dispositivos_pessoais', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos_usados_alunos_acessos');
    }
};
