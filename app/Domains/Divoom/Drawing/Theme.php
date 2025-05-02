<?php

namespace App\Domains\Divoom\Drawing;

interface Theme
{
    public Color $windowBorder { get; }

    public Color $windowShadow { get; }

    public Color $windowBackground { get; }

    public Color $titleBarBackground { get; }

    public Color $titleBarSystemMenuBackground { get; }

    public Color $desktopBackground { get; }

    public Color $cursorBorder { get; }

    public Color $cursorBackground { get; }

}
