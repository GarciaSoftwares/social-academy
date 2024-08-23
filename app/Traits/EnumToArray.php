<?php

namespace App\Traits;

trait EnumToArray
{
    public static function listNames(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function listValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toArray(): array
    {
        return array_combine(self::listValues(), self::listNames());
    }
}
