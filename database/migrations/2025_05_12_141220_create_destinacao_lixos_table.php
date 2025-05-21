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
        Schema::create('destinacao_lixos', function (Blueprint $table) {
            $table->id();
            $table->char('lixo_servico_coleta', 1);
            $table->char('lixo_queima', 1);
            $table->char('lixo_enterra', 1);
            $table->char('lixo_destinacao_final_licenciada', 1);
            $table->char('lixo_descarta_outra_area', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinacao__lixos');
    }
};
