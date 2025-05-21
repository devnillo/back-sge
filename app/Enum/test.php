<?php

namespace App\Enum;

enum test:string
{
    case a = '1';
    case b = '2';
    public function label(): string
    {
        return match($this) {
            self::a => 'Em atividade',
            self::b => 'Paralisada',
        };
    }
}

enum test2:string
{
    case c = '1';
    case d = '2';
    public function label(): string
    {
        return match($this) {
            self::c => 'Em atividade',
            self::d => 'Paralisada',
        };
    }
}