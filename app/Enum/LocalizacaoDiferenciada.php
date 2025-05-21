<?php

namespace App\Enum;

use App\Contracts\HasLabel;

enum LocalizacaoDiferenciada: string
{
    case Area_de_assentamento = '1';
    case Terra_indigena = '2';
    case Comunidade_quilombola = '3';
    case Nao = '7';
    case povos_comunidades_tradicionais = '8';

    public function label(): string
    {
        return match($this) {
            self::Area_de_assentamento => 'Área de assentamento',
            self::Terra_indigena => 'Terra indígena',
            self::Comunidade_quilombola => 'Comunidade quilombola',
            self::Nao => 'Não está em área de localização diferenciada',
            self::povos_comunidades_tradicionais => 'Área onde se localizam povos e comunidades tradicionais',
            };
    }
    
    // public static function labels(): array
    // {
    //     return [
    //         self::Sim->value => 'Sim',
    //         self::Nao->value => 'Não',
    //     ];
    // }
}
