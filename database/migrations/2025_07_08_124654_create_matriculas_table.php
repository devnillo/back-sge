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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aluno_id')->constrained('pessoas');
            $table->foreignId('turma_id')->constrained('turmas');

            $table->foreignId('escola_id')->nullable()->constrained('escolas');

            $table->date('data_matricula')->nullable();
            $table->enum('status', ['ativa', 'transferida', 'cancelada', 'pendente', 'abandono'])->default('ativa');
            $table->text('motivo_transferencia')->nullable();
            $table->date('data_transferencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
