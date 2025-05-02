<?php

namespace App\Domains\Divoom\Enums;

enum Channel: int
{
    case Faces = 0;
    case Cloud = 1;
    case Visualizer = 2;
    case Custom = 3;
    case Black = 4;
}
