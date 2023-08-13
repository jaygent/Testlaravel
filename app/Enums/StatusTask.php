<?php

namespace App\Enums;

enum StatusTask: string
{
    case Backlog='backlog';
    case Wip='wip';
    case Done='done';
    case Canceled='canceled';
}
