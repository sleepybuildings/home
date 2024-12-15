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

    public Color $cursorBorder;

    public Color $cursorBackground;

    public function __construct()
    {
        $this->windowBorder = Color::black();
        $this->windowShadow = Color::rgb(99, 150, 110)->blendOnCanvas();
        $this->windowBackground = Color::white();

        $this->titleBarBackground = Color::rgb(255, 206, 241);
        $this->titleBarSystemMenuBackground = Color::rgb(188, 193, 255);

        $this->desktopBackground = Color::rgb(242, 205, 170);

        $this->cursorBorder = Color::black()->blendOnCanvas();
        $this->cursorBackground = Color::rgb(223, 125, 187);

    }
}
