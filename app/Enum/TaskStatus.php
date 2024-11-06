<?php

namespace App\Enum;

enum TaskStatus : string
{
    case Created = 'Created';
    case Completed = 'Completed';
    case Pending = 'Pending';
    case InProggress = 'In Proggress';
}
