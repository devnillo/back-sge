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
        Schema::create('dependencias_fisicas', function (Blueprint $table) {
            $table->id();
            $table->char('dep_almoxarifado', 1);
            $table->char('dep_area_vegetacao_gramado', 1);
            $table->char('dep_auditorio', 1);
            $table->char('dep_banheiro', 1);
            $table->char('dep_banheiro_acessivel_pcd', 1);
            $table->char('dep_banheiro_educacao_infantil', 1);
            $table->char('dep_banheiro_funcionarios', 1);
            $table->char('dep_banheiro_vestiario_chuveiro', 1);
            $table->char('dep_biblioteca', 1);
            $table->char('dep_cozinha', 1);
            $table->char('dep_despensa', 1);
            $table->char('dep_dormitorio_aluno', 1);
            $table->char('dep_dormitorio_professor', 1);
            $table->char('dep_laboratorio_ciencias', 1);
            $table->char('dep_laboratorio_informatica', 1);
            $table->char('dep_laboratorio_educacao_profissional', 1);
            $table->char('dep_parque_infantil', 1);
            $table->char('dep_patio_coberto', 1);
            $table->char('dep_patio_descoberto', 1);
            $table->char('dep_piscina', 1);
            $table->char('dep_quadra_esportes_coberta', 1);
            $table->char('dep_quadra_esportes_descoberta', 1);
            $table->char('dep_refeitorio', 1);
            $table->char('dep_sala_repouso_aluno', 1);
            $table->char('dep_sala_artes', 1);
            $table->char('dep_sala_musica_coral', 1);
            $table->char('dep_sala_danca', 1);
            $table->char('dep_sala_multiuso', 1);
            $table->char('dep_terreirao', 1);
            $table->char('dep_viveiro_animais', 1);
            $table->char('dep_sala_diretoria', 1);
            $table->char('dep_sala_leitura', 1);
            $table->char('dep_sala_professores', 1);
            $table->char('dep_sala_recursos_multifuncionais', 1);
            $table->char('dep_sala_secretaria', 1);
            $table->char('dep_sala_oficinas_profissionais', 1);
            $table->char('dep_estudio_gravacao_edicao', 1);
            $table->char('dep_area_horta_plantio_agricultura', 1);
            $table->char('dep_nenhuma_das_dependencias', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencias__fisicas');
    }
};
