<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class SentGif extends BaseRequest
{
    public function __construct(
        public readonly int $PicNum,
        public readonly int $PicID,
        public readonly int $PicSpeed,
        public readonly string $PicData,
        public readonly int $PicOffset,
        public readonly int $PicWidth = 64,
    ) {
        parent::__construct('Draw/SendHttpGif');
    }
}
