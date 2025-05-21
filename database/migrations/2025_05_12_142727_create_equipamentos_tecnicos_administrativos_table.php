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
        Schema::create('equipamentos_tecnicos_administrativos', function (Blueprint $table) {
            $table->id();
            $table->char('equip_antena_parabolica', 1);
            $table->char('equip_computadores', 1);
            $table->char('equip_copiadora', 1);
            $table->char('equip_impressora', 1);
            $table->char('equip_impressora_multifuncional', 1);
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
        Schema::dropIfExists('equipamentos_tecnicos_administrativos');
    }
};
