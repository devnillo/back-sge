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
        Schema::create('equipamentos_didaticos', function (Blueprint $table) {
            $table->id();
            $table->char('equip_dvd_blu_ray', 1);
            $table->char('equip_som', 1);
            $table->char('equip_televisao', 1);
            $table->char('equip_lousa_digital', 1);
            $table->char('equip_projetor_multimidia', 1);
            $table->char('equip_scanner', 1);
            $table->char('equip_nenhum_listado', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos_didaticos');
    }
};
