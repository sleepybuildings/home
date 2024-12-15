<?php

namespace App\Divoom\Drawing;

readonly class Color
{
    public function __construct(
        public int $r,
        public int $g,
        public int $b,
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
}
