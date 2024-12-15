<?php

namespace App\Divoom\Drawing;

abstract class Sprite implements DrawsOnCanvasContract
{
    /**
     * 2d array containing the image.
     * Each value corresponds to an index in the
     * color palette array.
     *
     * @var array<array-key, array<array-key, int>>
     */
    protected array $image;

    /**
     * @var array<array-key, Color|null>
     */
    public array $colorPalette = [];

    public function __construct(
        public Theme $theme,
        public int $x = 0,
        public int $y = 0
    ) {
        $this->colorPalette[] = null; // Transparent
    }

    public function drawOn(Canvas $canvas): void
    {
        foreach ($this->image as $y => $row) {
            foreach ($row as $x => $colorIndex) {

                if (! $this->colorPalette[$colorIndex]) {
                    continue;
                }

                $canvas->setPixel(
                    $this->x + $x, $this->y + $y,
                    $this->colorPalette[$colorIndex]
                );
            }
        }
    }
}
