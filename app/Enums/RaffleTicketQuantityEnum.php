<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum RaffleTicketQuantityEnum: int
{
    use EnumToArray;

    case _25_ = 25;

    case _50_ = 50;

    case _100_ = 100;

    case _200_ = 200;

    case _300_ = 300;

    case _400_ = 400;

    case _500_ = 500;

    case _1000_ = 1000;

    case _5000_ = 2000;

    case _10000_ = 10000;

    case _50000_ = 50000;

    case _1000000_ = 1000000;
}
