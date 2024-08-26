<?php

namespace App\Enums\Statuses;

use App\Traits\EnumToArray;

enum RaffleTicketStatusEnum: string
{
    use EnumToArray;

    case PAID = StatusEnum::PAID->value;

    case PENDING = StatusEnum::PENDING->value;
}
