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
        Schema::create('solicitacao_transferencias', function (Blueprint $table) {
            $table->id();
            $table->string('id_escola_origem');
            $table->string('id_escola_destino');
            $table->foreignId('escola_antiga_id')->constrained('escolas');
            $table->foreignId('escola_nova_id')->constrained('escolas');
            $table->foreignId('pessoa_id')->constrained('pessoas');
            $table->string('status')->default('pendente');
            $table->string('motivo')->nullable();
            $table->string('data_solicitacao')->nullable();
            $table->string('data_aceite')->nullable();
            $table->string('data_rejeicao')->nullable();
            $table->string('data_cancelamento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacao_transferencias');
    }
};
