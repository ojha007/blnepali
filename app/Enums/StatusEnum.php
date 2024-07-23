<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case DELETED = 'deleted';
    case DRAFT = 'draft';
    case INACTIVE = 'inactive';
}
