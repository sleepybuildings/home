<?php

namespace App\Divoom\Drawing;

interface Theme
{

    public Color $windowBorder { get; }
    public Color $windowShadow { get; }
    public Color $windowBackground { get; }

    public Color $titleBarBackground { get; }
    public Color $titleBarSystemMenuBackground { get; }

    public Color $desktopBackground { get; }

}
