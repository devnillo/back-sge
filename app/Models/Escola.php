<?php

namespace App\Models;

use App\Enum\LocalizacaoDiferenciada;
use App\Enum\SimNao;
use Database\Seeders\EscolaInfraSeeder;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $with = ['pessoas', 'infraestrutura'];
    protected $casts = [
        'vinculo_orgao_educacao' => SimNao::class,
        'vinculo_orgao_seguranca' => SimNao::class,
        'vinculo_orgao_saude' => SimNao::class,
        'vinculo_orgao_outro' => SimNao::class,

        'localizacao_diferenciada' => LocalizacaoDiferenciada::class
    ];
    protected $fillable = [
        'secretaria_id',
        'diretor_id',
        'tipo_registro',
        'codigo_escola_inep',
        'nome_escola',
        'situacao_funcionamento',
        'data_inicio_ano_letivo',
        'data_termino_ano_letivo',
        'cep',
        'municipio_codigo',
        'distrito_codigo',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'ddd',
        'telefone',
        'outro_telefone',
        'email_escola',
        'codigo_orgao_regional',
        'localizacao_zona',
        'localizacao_diferenciada',
        'dependencia_administrativa',
        'vinculo_orgao_educacao',
        'vinculo_orgao_seguranca',
        'vinculo_orgao_saude',
        'vinculo_orgao_outro',
        'mantenedora_empresa_privada',
        'mantenedora_sindicato_assoc_coop',
        'mantenedora_ong',
        'mantenedora_sem_fins_lucrativos',
        'mantenedora_sistema_s',
        'mantenedora_oscip',
        'categoria_escola_privada',
        'parceria_convenio_resp_estadual',
        'parceria_convenio_resp_municipal',
        'parceria_convenio_nao_possui',
        'parc_est_termo_colaboracao',
        'parc_est_termo_fomento',
        'parc_est_acordo_cooperacao',
        'parc_est_contrato_prestacao_servico',
        'parc_est_termo_coop_tec_fin',
        'parc_est_contrato_consorcio_convenio',
        'parc_mun_termo_colaboracao',
        'parc_mun_termo_fomento',
        'parc_mun_acordo_cooperacao',
        'parc_mun_contrato_prestacao_servico',
        'parc_mun_termo_coop_tec_fin',
        'parc_mun_contrato_consorcio_convenio',
        'cnpj_mantenedora_principal',
        'cnpj_escola_privada',
        'regulamentacao_autorizacao_conselho',
        'esfera_adm_conselho_federal',
        'esfera_adm_conselho_estadual',
        'esfera_adm_conselho_municipal',
        'vinculo_outra_instituicao_tipo',
        'codigo_escola_sede_vinculada',
        'codigo_ies_vinculada',

        'escola_indigena',
        'educacao_ambiental'
    ];
    // protected $with = ['admin', 'infraestrutura'];

    protected $hidden = [
        'senha',
    ];

    public function admin()
    {
        return $this->belongsTo(Secretarias::class, 'secretaria_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function pessoas()
    {
        return $this->hasMany(Pessoas::class);
    }
    public function infraestrutura()
    {
        return $this->hasOne(EscolaInfraestrutura::class);
    }
}
