<?php

namespace App\Domains\Divoom\Drawing;

class Canvas
{
    /**
     * The size of the screen
     */
    private const int Size = 64;

    /**
     * Amount of bytes used for color
     */
    private const int ColorSize = 3;

    /**
     * Total amount of pixels on the screen
     */
    private int $pixelCount;

    /**
     * Strided array with the screen buffer
     *
     * @var array<array-key, int>
     */
    private array $canvas;

    public function __construct(?Color $backgroundColor = null)
    {
        $this->pixelCount = self::Size * self::Size;
        $this->canvas = array_fill(0, $this->pixelCount * self::ColorSize, 0);

        if ($backgroundColor) {
            $this->fill(0, 0, self::Size, self::Size, $backgroundColor);
        }
    }

    /**
     * Returns true if the given coordinate is outside the canvas space.
     */
    public function isOutOfBounds(int $x, int $y): bool
    {
        return $x < 0 || $y < 0
            || $x >= self::Size
            || $y >= self::Size;
    }

    /**
     * Fills the canvas with a pattern
     *
     * @return $this
     */
    public function fillPattern(Color $firstColor, Color $secondColor): self
    {
        for ($index = 0; $index < $this->pixelCount; $index++) {
            $alteredRow = ($index / self::Size) % 2 === 0;
            $this->setPixelAt(
                index: $index,
                color: $index % 2 === 0
                    ? ($alteredRow ? $firstColor : $secondColor)
                    : ($alteredRow ? $secondColor : $firstColor)
            );
        }

        return $this;
    }

    /**
     * Fills the given area with the given color.
     *
     * @return $this
     */
    public function fill(int $x, int $y, int $width, int $height, Color $color): self
    {
        for ($column = $x; $column <= $x + $width - 1; $column++) {
            for ($row = $y; $row <= $y + $height - 1; $row++) {
                $this->setPixel($column, $row, $color);
            }
        }

        return $this;
    }

    public function rectangle(int $x, int $y, int $width, int $height, Color $color): self
    {
        return $this
            ->line($x, $y, $x + $width, $y, $color)
            ->line($x, $y + $height, $x + $width, $y + $height, $color)
            ->line($x, $y, $x, $y + $height, $color)
            ->line($x + $width, $y, $x + $width, $y + $height, $color);
    }

    public function line2(int $fromX, int $fromY, int $toX, int $toY, Color $color): self
    {
        // This is broken
        // https://rosettacode.org/wiki/Bitmap/Bresenham's_line_algorithm

        $deltaX = abs($fromX - $toX);
        $deltaY = abs($fromY - $toY);
        $delta = abs($deltaX > 0 ? $deltaY / $deltaX : INF);
        $error = 0.0;

        $y = $fromY;
        for ($x = $fromX; $x <= $toX; $x++) {
            $this->setPixel($x, $y, $color);

            $error += $delta;
            if ($error > 0.5) {
                $y++;
                $error -= 1.0;
            }
        }

        return $this;
    }

    public function line(int $fromX, int $fromY, int $toX, int $toY, Color $color): self
    {
        // https://rosettacode.org/wiki/Bitmap/Bresenham's_line_algorithm

        $dx = abs($toX - $fromX);
        $sx = $fromX < $toX ? 1 : -1;
        $dy = abs($toY - $fromY);
        $sy = $fromY < $toY ? 1 : -1;
        $error = ($dx > $dy ? $dx : -$dy) / 2;

        while (true) {
            $this->setPixel($fromX, $fromY, $color);

            if ($fromX === $toX && $fromY === $toY) {
                break;
            }

            $errorCopy = $error;

            if ($errorCopy > -$dx) {
                $error -= $dy;
                $fromX += $sx;
            }

            if ($errorCopy < $dy) {
                $error += $dx;
                $fromY += $sy;
            }
        }

        return $this;
    }

    /**
     * Updates a pixel at the given index.
     */
    private function setPixelAt(int $index, Color $color): self
    {
        $atIndex = $index * self::ColorSize;

        if ($color->blendOnCanvas) {
            $color = $color->blend(withColor: $this->getColorAt($index));
        }

        $this->canvas[$atIndex] = $color->r;
        $this->canvas[$atIndex + 1] = $color->g;
        $this->canvas[$atIndex + 2] = $color->b;

        return $this;
    }

    /**
     * Returns the Color at the given index
     */
    private function getColorAt(int $index): Color
    {
        $atIndex = $index * self::ColorSize;

        return new Color(
            r: $this->canvas[$atIndex],
            g: $this->canvas[$atIndex + 1],
            b: $this->canvas[$atIndex + 2],
        );
    }

    /**
     * Updates a pixel at the given coordinates.
     *
     * @return $this|self
     */
    public function setPixel(int $x, int $y, Color $color): self
    {
        $atIndex = $x + ($y * self::Size);
        if ($atIndex < 0 || $atIndex >= $this->pixelCount) {
            return $this;
        }

        return self::setPixelAt($atIndex, $color);
    }

    /**
     * Generates a base64 representation of
     * the canvas, which can be sent to
     * the device.
     */
    public function toBase64(): string
    {
        return base64_encode(
            pack('C*', ...$this->canvas)
        );
    }
}
