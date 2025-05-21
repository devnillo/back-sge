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
        Schema::create('cargo_permissao', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('cargo_id')->constrained()->onDelete('cascade');
            // $table->foreignId('permissao_id')->constrained()->onDelete('cascade');
            // $table->primary(['cargo_id', 'permissao_id']);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_permissao');
    }
};
