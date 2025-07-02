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
        Schema::create('tratamento_lixo', function (Blueprint $table) {
            $table->id();
            $table->char('tratamento_separacao', 1);
            $table->char('tratamento_reaproveitamento', 1);
            $table->char('tratamento_reciclagem', 1);
            $table->char('tratamento_nao_faz', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamento_lixo');
    }
};
