<?php

namespace App\Models;

use App\HasOneInfraestruturaRelations as AppHasOneInfraestruturaRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasOneInfraestruturaRelations;

class EscolaInfraestrutura extends Model
{
    use AppHasOneInfraestruturaRelations;
    protected $with = ['abastecimento_agua'];
    protected $fillable = [
        "codigo_escola_inep",
        "predio_escolar",
        "salas_em_outra_escola",
        "galpao_rancho_paiol_barracao",
        "unidade_atendimento_socioeducativa",
        "unidade_prisional",
        "outros_locais_funcionamento",
        "forma_ocupacao_predio",
        "predio_compartilhado_outra_escola",
        "codigo_escola_compartilha_1",
        "codigo_escola_compartilha_2",
        "codigo_escola_compartilha_3",
        "codigo_escola_compartilha_4",
        "codigo_escola_compartilha_5",
        "codigo_escola_compartilha_6",
        "alimentacao_escolar_alunos",
        "escola_id"
    ];

    // Estrutura básica
    public function abastecimento_agua()
    {
        return $this->infraRelation(AbastecimentoAgua::class);
    }
    public function energia_eletrica()
    {
        return $this->infraRelation(FonteEnergia::class);
    }
    public function esgotamento()
    {
        return $this->infraRelation(EsgotamentoSanitario::class);
    }
    public function destinacao_lixo()
    {
        return $this->infraRelation(DestinacaoLixo::class);
    }
    public function tratamento_lixo()
    {
        return $this->infraRelation(TratamentoLixo::class);
    }

    // Dependências e acessibilidade
    public function dependencias()
    {
        return $this->infraRelation(DependenciasFisicas::class);
    }
    public function acessibilidade()
    {
        return $this->infraRelation(RecursosAcessibilidade::class);
    }

    // Equipamentos
    public function salas_aula()
    {
        return $this->infraRelation(SalasAulas::class);
    }
    public function equipamentos_admin()
    {
        return $this->infraRelation(EquipamentosTecnicosAdministrativos::class);
    }
    public function equipamentos_didaticos()
    {
        return $this->infraRelation(EquipamentosEnsinoAprendizagem::class);
    }
    public function computadores_alunos()
    {
        return $this->infraRelation(ComputadoresUsoAlunos::class);
    }

    // Internet e rede
    public function acesso_internet()
    {
        return $this->infraRelation(AcessoInternet::class);
    }
    public function tipo_internet()
    {
        return $this->infraRelation(TipoInternet::class);
    }
    public function rede_local()
    {
        return $this->infraRelation(RedeLocalInteligacaoComputadores::class);
    }
    public function equipamentos_acesso()
    {
        return $this->infraRelation(EquipamentosUsadosAlunosAcesso::class);
    }

    // Outros
    public function infraestrutura_profissionais()
    {
        return $this->infraRelation(InfraestruturaProfissionais::class);
    }
    public function materiais_pedagogicos()
    {
        return $this->infraRelation(InstrumentosMateriaisPedagogicos::class);
    }
    public function linguas_ensino()
    {
        return $this->infraRelation(LinguaEnsino::class);
    }
    public function sistema_cotas()
    {
        return $this->infraRelation(SistemaCotas::class);
    }
    public function integracao_comunidade()
    {
        return $this->infraRelation(IntegracaoComunidade::class);
    }
    public function orgaos_colegiados()
    {
        return $this->infraRelation(OrgaosColegiados::class);
    }
    public function educacao_ambiental()
    {
        return $this->infraRelation(FormasDesenvolvimentoEducacaoAmbiental::class);
    }

    // Relação principal
    public function escola(): BelongsTo
    {
        return $this->belongsTo(Escola::class, 'escola_id');
    }
}
