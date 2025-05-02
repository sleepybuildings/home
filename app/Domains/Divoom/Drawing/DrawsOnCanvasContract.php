<?php

namespace App\Domains\Divoom\Drawing;

interface DrawsOnCanvasContract
{
    public function drawOn(Canvas $canvas): void;
}
