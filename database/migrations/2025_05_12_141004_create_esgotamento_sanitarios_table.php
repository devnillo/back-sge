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
        Schema::create('esgotamento_sanitarios', function (Blueprint $table) {
            $table->id();
            $table->char('esgoto_rede_publica', 1);
            $table->char('esgoto_fossa_septica', 1);
            $table->char('esgoto_fossa_rudimentar', 1);
            $table->char('esgoto_nao_ha', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esgotamento_sanitarios');
    }
};
