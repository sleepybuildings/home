<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class SetText extends BaseRequest
{
    public function __construct(
        public readonly int $TextID,
        public readonly int $x,
        public readonly int $y,
        public readonly int $dir,
        public readonly int $font,
        public readonly int $TextWidth,
        public readonly string $TextString,
        public readonly int $speed,
        public readonly string $color,
        public readonly int $align,
    ) {
        parent::__construct('Draw/SendHttpText');
    }
}
