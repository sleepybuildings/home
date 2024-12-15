<?php

namespace App\Divoom\Drawing\Components;

use App\Divoom\Drawing\Canvas;
use App\Divoom\Drawing\DrawsOnCanvasContract;
use App\Divoom\Drawing\Theme;

class Window implements DrawsOnCanvasContract
{
    public function __construct(
        public Theme $theme,
        public int $x = 0,
        public int $y = 0,
        public int $width = 64,
        public int $height = 64
    ) {}

    public function at(int $x, int $y): self
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    public function size(int $width, int $height): self
    {
        $this->width = $width;
        $this->height = $height;

        return $this;
    }

    /**
     * Draws the titlebar elements
     *
     * @return $this
     */
    public function drawTitleBar(Canvas $canvas): self
    {
        // System menu

        $canvas->fill(
            $this->x + 1, $this->y + 1,
            3, 3,
            $this->theme->titleBarSystemMenuBackground
        );

        $canvas->setPixel($this->x + 2, $this->y + 2, $this->theme->windowBorder);

        // Separator

        $canvas->line(
            $this->x + 4, $this->y + 1,
            $this->x + 4, $this->y + 3,
            $this->theme->windowBorder
        );

        // Bottom separator

        $canvas->line(
            $this->x + 1, $this->y + 4,
            $this->x + $this->width - 1, $this->y + 4,
            $this->theme->windowBorder
        );

        $canvas->fill(
            $this->x + 5, $this->y + 1,
            $this->width - 5, 3,
            $this->theme->titleBarBackground
        );

        return $this;
    }

    public function drawWindowFrame(Canvas $canvas): self
    {
        // The frame itself and the background

        $canvas->rectangle(
            $this->x, $this->y,
            $this->width, $this->height,
            $this->theme->windowBorder
        );

        $canvas->fill(
            $this->x + 1, $this->y + 1,
            $this->width - 1, $this->height - 1,
            $this->theme->windowBackground
        );

        // The shadows

        $canvas->line(
            $this->x + $this->width + 1, $this->y + 1,
            $this->x + $this->width + 1, $this->y + $this->height,
            $this->theme->windowShadow
        );

        $canvas->line(
            $this->x + 1, $this->y + $this->height + 1,
            $this->x + $this->width + 1, $this->y + $this->height + 1,
            $this->theme->windowShadow
        );

        return $this;
    }

    public function drawOn(Canvas $canvas): void
    {
        $this->drawWindowFrame($canvas)->drawTitleBar($canvas);
    }
}
