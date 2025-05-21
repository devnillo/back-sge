<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class secretarySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('secretarias')->insert([
            [
                'nome' => 'João',
                'email' => 'joo.silva@example.com',
                'telefone' => '(11) 99999-9999',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'endereco' => 'Rua das Flores, 123',
                'cep' => '01234-567',
                'senha' => Hash::make('senha123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Adicione mais registros conforme necessário
        ]);
        DB::table('escolas')->insert([
            [
                'tipo_registro' => '00',
                'codigo_escola_inep' => '12345678',
                'nome_escola' => 'Escola Primária',
                'situacao_funcionamento' => '1',
                'data_inicio_ano_letivo' => '2023-01-01',
                'data_termino_ano_letivo' => '2023-12-31',
                'cep' => '12345678',
                'municipio_codigo' => '1111111',
                'distrito_codigo' => '01',
                'endereco' => 'Rua das Palmeira',
                'numero' => '123',
                // 'complemento' => '',
                'bairro' => 'Centro',
                'ddd' => '11',
                'telefone' => '999999999',
                'outro_telefone' => '888888888',
                'email_escola' => 'escola@gmail.com',
                'codigo_orgao_regional' => '12345',
                'localizacao_zona' => '1',
                'localizacao_diferenciada' => '7',
                'dependencia_administrativa' => '3',
                'vinculo_orgao_educacao' => '1',
                'vinculo_orgao_seguranca' => '1',
                'vinculo_orgao_saude' => '0',
                'vinculo_orgao_outro' => '0',
                'escola_indigena' => '0',
                'educacao_ambiental' => '0',
                // 'mantenedora_empresa_privada',
                // 'mantenedora_sindicato_assoc_coop',
                // 'mantenedora_ong',
                // 'mantenedora_sem_fins_lucrativos',
                // 'mantenedora_sistema_s',
                // 'mantenedora_oscip',
                // 'categoria_escola_privada',
                'parceria_convenio_resp_estadual' => '0',
                'parceria_convenio_resp_municipal' => '1',
                'parceria_convenio_nao_possui' => '0',
                'parc_est_termo_colaboracao' => '1',
                'parc_est_termo_fomento' => '1',
                'parc_est_acordo_cooperacao' => '0',
                'parc_est_contrato_prestacao_servico' => '0',
                'parc_est_termo_coop_tec_fin' => '0',
                'parc_est_contrato_consorcio_convenio' => '0',
                'parc_mun_termo_colaboracao' => '0',
                'parc_mun_termo_fomento' => '1',
                'parc_mun_acordo_cooperacao' => '0',
                'parc_mun_contrato_prestacao_servico' => '1',
                'parc_mun_termo_coop_tec_fin' => '0',
                'parc_mun_contrato_consorcio_convenio' => '0',
                // 'cnpj_mantenedora_principal',
                // 'cnpj_escola_privada',
                'regulamentacao_autorizacao_conselho' => '1',
                // 'esfera_adm_conselho_federal' => '0',
                'esfera_adm_conselho_estadual' => '0',
                'esfera_adm_conselho_municipal' => '1',
                'vinculo_outra_instituicao_tipo' => '0',
                // 'codigo_escola_sede_vinculada' ,
                // 'codigo_ies_vinculada',
                'secretaria_id' => 1,
            ],
            // Adicione mais registros conforme necessário
        ]);
    }
}
