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
        Schema::create('escolas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_registro')->default('00');
            $table->char('codigo_escola_inep', 8)->unique();
            $table->string('nome_escola', 100);
            $table->char('situacao_funcionamento', 1);
            $table->date('data_inicio_ano_letivo')->nullable();
            $table->date('data_termino_ano_letivo')->nullable();
            $table->char('cep', 8);
            $table->char('municipio_codigo', 7);
            $table->string('distrito_codigo', 2);
            $table->string('endereco', 100);
            $table->string('numero', 10);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->char('ddd', 2)->nullable();
            $table->string('telefone')->nullable();
            $table->string('outro_telefone')->nullable();
            $table->string('email_escola')->nullable();
            $table->string('codigo_orgao_regional')->nullable();
            $table->string('localizacao_zona', 1);
            $table->string('localizacao_diferenciada', 1);
            $table->string('dependencia_administrativa', 1);
            $table->string('vinculo_orgao_educacao')->nullable();
            $table->string('vinculo_orgao_seguranca')->nullable();
            $table->string('vinculo_orgao_saude')->nullable();
            $table->string('vinculo_orgao_outro')->nullable();
            $table->string('mantenedora_empresa_privada')->nullable();
            $table->string('mantenedora_sindicato_assoc_coop')->nullable();
            $table->string('mantenedora_ong')->nullable();
            $table->string('mantenedora_sem_fins_lucrativos')->nullable();
            $table->string('mantenedora_sistema_s')->nullable();
            $table->string('mantenedora_oscip')->nullable();
            $table->string('categoria_escola_privada')->nullable();
            $table->string('parceria_convenio_resp_estadual')->nullable();
            $table->string('parceria_convenio_resp_municipal')->nullable();
            $table->string('parceria_convenio_nao_possui')->nullable();
            $table->string('parc_est_termo_colaboracao')->nullable();
            $table->string('parc_est_termo_fomento')->nullable();
            $table->string('parc_est_acordo_cooperacao')->nullable();
            $table->string('parc_est_contrato_prestacao_servico')->nullable();
            $table->string('parc_est_termo_coop_tec_fin')->nullable();
            $table->string('parc_est_contrato_consorcio_convenio')->nullable();
            $table->string('parc_mun_termo_colaboracao')->nullable();
            $table->string('parc_mun_termo_fomento')->nullable();
            $table->string('parc_mun_acordo_cooperacao')->nullable();
            $table->string('parc_mun_contrato_prestacao_servico')->nullable();
            $table->string('parc_mun_termo_coop_tec_fin')->nullable();
            $table->string('parc_mun_contrato_consorcio_convenio')->nullable();
            $table->string('cnpj_mantenedora_principal')->nullable();
            $table->string('cnpj_escola_privada')->nullable();
            $table->string('regulamentacao_autorizacao_conselho')->nullable();
            $table->string('esfera_adm_conselho_federal')->nullable();
            $table->string('esfera_adm_conselho_estadual')->nullable();
            $table->string('esfera_adm_conselho_municipal')->nullable();
            $table->string('vinculo_outra_instituicao_tipo')->nullable();
            $table->string('codigo_escola_sede_vinculada')->nullable();
            $table->string('codigo_ies_vinculada')->nullable();
            
            
            $table->char('escola_indigena', 1);
            $table->char('exame_selecao_ingresso', 1)->nullable();
            $table->char('ppp_atualizado_ultimos_12_meses', 1)->nullable();
            $table->char('educacao_ambiental', 1);

            $table->foreignId('secretaria_id')->constrained('secretarias')->onDelete('cascade');
            $table->foreignId('diretor_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};
