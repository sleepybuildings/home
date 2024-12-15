<?php

namespace App\Divoom\Drawing;

interface DrawsOnCanvasContract
{
    public function drawOn(Canvas $canvas): void;
}
