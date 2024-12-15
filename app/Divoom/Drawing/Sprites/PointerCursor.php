<?php

namespace App\Divoom\Drawing\Sprites;

use App\Divoom\Drawing\Sprite;
use App\Divoom\Drawing\Theme;

class PointerCursor extends Sprite
{
    public function __construct(Theme $theme, int $x = 0, int $y = 0)
    {
        parent::__construct($theme, $x, $y);

        $this->colorPalette[] = $theme->cursorBorder;
        //$this->colorPalette[] = $theme->cursorBackground;

        $this->image = [
            [1, 1, 1, 1],
            [1, 1, 1, 0],
            [1, 1, 1, 0],
            [1, 0, 0, 1],
            [0, 0, 0, 0, 1],
        ];
    }
}