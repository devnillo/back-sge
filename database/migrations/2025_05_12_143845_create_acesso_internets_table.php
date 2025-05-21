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
        Schema::create('acesso_internets', function (Blueprint $table) {
            $table->id();
            $table->char('internet_uso_administrativo', 1);
            $table->char('internet_uso_ensino_aprendizagem', 1);
            $table->char('internet_uso_alunos', 1);
            $table->char('internet_uso_comunidade', 1);
            $table->char('internet_nao_possui', 1);
            
            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acesso_internets');
    }
};
