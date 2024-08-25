<?php

namespace App\Enums\Statuses;

use App\Traits\EnumToArray;

enum RaffleStatusEnum: string
{
    use EnumToArray;

    case ACTIVE = StatusEnum::ACTIVE->value;

    case INACTIVE = StatusEnum::INACTIVE->value;

    case PENDING = StatusEnum::PENDING->value;
}
