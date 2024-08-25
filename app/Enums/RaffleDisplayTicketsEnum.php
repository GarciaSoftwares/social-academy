<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum RaffleDisplayTicketsEnum: string
{
    use EnumToArray;
    case RANDOM = 'random';

    case LIST = 'list';
}
