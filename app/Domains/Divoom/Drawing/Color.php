<?php

namespace App\Domains\Divoom\Drawing;

readonly class Color
{
    public function __construct(
        public int $r,
        public int $g,
        public int $b,
        public bool $blendOnCanvas = false,
    ) {}

    public static function white(): self
    {
        return new self(255, 255, 255);
    }

    public static function rgb(int $r, int $g, int $b): self
    {
        return new self($r, $g, $b);
    }

    public static function black(): self
    {
        return new self(0, 0, 0);
    }

    /**
     * Blends the current color with the given color
     * and returns the new color.
     */
    public function blend(Color $withColor): Color
    {
        return new Color(
            intval(($this->r + $withColor->r) / 2),
            intval(($this->g + $withColor->g) / 2),
            intval(($this->b + $withColor->b) / 2)
        );
    }

    /**
     * Call this to blend the color with the color
     * already on the canvas.
     */
    public function blendOnCanvas(): Color
    {
        return new Color(
            r: $this->r,
            g: $this->g,
            b: $this->b,
            blendOnCanvas: true
        );
    }
}
