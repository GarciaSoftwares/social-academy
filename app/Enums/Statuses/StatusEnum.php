<?php

namespace App\Enums\Statuses;

use App\Traits\EnumToArray;

enum StatusEnum: string
{
    use EnumToArray;

    case ACTIVE = 'active';

    case INACTIVE = 'inactive';

    case DELETED = 'deleted';

    case PENDING = 'pending';

    case PAID = 'paid';
}
