<?php

namespace App\Enums;

enum BoardPermission: string
{
    case VIEW = 'View';
    case EDIT = 'Edit';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
