<?php

namespace App\Divoom\Drawing\Themes;

use App\Divoom\Drawing\Color;
use App\Divoom\Drawing\Theme;

class DefaultTheme implements Theme
{
    public Color $windowBorder;

    public Color $windowBackground;

    public Color $windowShadow;

    public Color $desktopBackground;

    public Color $titleBarBackground;

    public Color $titleBarSystemMenuBackground;

    public function __construct()
    {
        $this->windowBorder = Color::black();
        $this->windowShadow = Color::black();
        $this->windowBackground = Color::white();

        $this->titleBarBackground = Color::rgb(247, 247, 40);
        $this->titleBarSystemMenuBackground = Color::rgb(194, 118, 219);

        $this->desktopBackground = Color::rgb(219, 204, 224);
    }
}
