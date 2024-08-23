<?php

namespace App\Enums\Statuses;

use App\Traits\EnumToArray;

enum RaffleCategoryStatusEnum: string
{
    use EnumToArray;

    case ACTIVE = StatusEnum::ACTIVE->value;

    case INACTIVE = StatusEnum::INACTIVE->value;
}
