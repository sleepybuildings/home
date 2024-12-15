<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class PlayBuzzer extends BaseRequest
{
    public function __construct(
        public readonly int $ActiveTimeInCycle,
        public readonly int $OffTimeInCycle,
        public readonly int $PlayTotalTime,
    ) {
        parent::__construct('Device/PlayBuzzer');
    }
}
