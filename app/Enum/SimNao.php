<?php

namespace App\Enum;

use App\Contracts\HasLabel;

enum SimNao: string
{
    case Nao = '0';
    case Sim = '1';

    public function label(): string
    {
        return match($this) {
            self::Sim => 'Sim',
            self::Nao => 'Não',
        };
    }
    
    public static function labels(): array
    {
        return [
            self::Sim->value => 'Sim',
            self::Nao->value => 'Não',
        ];
    }
}
