<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;
use App\Divoom\Enums\Channel;

class SelectChannel extends BaseRequest
{
    public readonly int $SelectIndex;

    public function __construct(Channel $channel)
    {
        $this->SelectIndex = $channel->value;
        parent::__construct('Channel/SetIndex');
    }
}
