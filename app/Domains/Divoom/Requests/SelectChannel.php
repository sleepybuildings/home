<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;
use App\Domains\Divoom\Enums\Channel;

class SelectChannel extends BaseRequest
{
    public readonly int $SelectIndex;

    public function __construct(Channel $channel)
    {
        $this->SelectIndex = $channel->value;
        parent::__construct('Channel/SetIndex');
    }
}
