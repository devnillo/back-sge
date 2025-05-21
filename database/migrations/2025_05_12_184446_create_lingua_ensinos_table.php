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
        Schema::create('lingua_ensinos', function (Blueprint $table) {
            $table->id();
            $table->char('ensino_lingua_indigena', 1)->nullable();
            $table->char('ensino_lingua_portuguesa', 1)->nullable();
            $table->char('codigo_lingua_indigena_1', 1)->nullable();
            $table->char('codigo_lingua_indigena_2', 1)->nullable();
            $table->char('codigo_lingua_indigena_3', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lingua_ensinos');
    }
};
