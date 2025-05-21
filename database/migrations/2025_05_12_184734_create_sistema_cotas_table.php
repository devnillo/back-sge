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
        Schema::create('sistema_cotas', function (Blueprint $table) {
            $table->id();
            $table->char('cota_ppi', 1)->nullable();
            $table->char('cota_renda', 1)->nullable();
            $table->char('cota_escola_publica', 1)->nullable();
            $table->char('cota_deficiencia', 1)->nullable();
            $table->char('cota_outros_grupos', 1)->nullable();
            $table->char('cota_ampla_concorrencia', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistema_cotas');
    }
};
