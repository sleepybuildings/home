<?php

namespace App\Divoom;

use Spatie\LaravelData\Data;

class BaseRequest extends Data
{
    public function __construct(
        public readonly string $Command,
    ) {}
}
