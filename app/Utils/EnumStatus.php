<?php

namespace App\Utils;

enum EnumStatus : int
{
    case Active = 1;
    case InActive = 2;
    case Approved = 3;
    case Pending = 4;
}
