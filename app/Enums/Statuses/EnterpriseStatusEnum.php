<?php

namespace App\Enums\Statuses;

use App\Traits\EnumToArray;

enum EnterpriseStatusEnum: string
{
    use EnumToArray;

    case ACTIVE = StatusEnum::ACTIVE->value;

    case INACTIVE = StatusEnum::INACTIVE->value;

    case DELETED = StatusEnum::DELETED->value;

    case PENDING = StatusEnum::PENDING->value;
}
