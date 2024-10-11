<?php

namespace App\Enums;


/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

enum ProjectStatus: string
{
    case Open = 'open';
    case Closed = 'closed';

    public function label(): string
    {

        return match ($this) {
            self::Open => 'Aceitando Propostas',
            self::Closed => 'Encerrado',
        };
    }
}
