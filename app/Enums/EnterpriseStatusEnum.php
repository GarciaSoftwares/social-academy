<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum EnterpriseStatusEnum: string
{
    use EnumToArray;

    case ACTIVE = 'active';

    case INACTIVE = 'inactive';

    case DELETED = 'deleted';

    case PENDING = 'pending';
}
