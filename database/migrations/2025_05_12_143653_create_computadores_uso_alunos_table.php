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
        Schema::create('computadores_uso_alunos', function (Blueprint $table) {
            $table->id();
            $table->char('comp_aluno_desktop', 1);
            $table->char('comp_aluno_portateis', 1);
            $table->char('comp_aluno_tablets', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadores_uso_alunos');
    }
};
