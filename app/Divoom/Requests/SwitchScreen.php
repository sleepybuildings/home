<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class SwitchScreen extends BaseRequest
{
    public readonly int $OnOff;

    public function __construct(bool $on)
    {
        $this->OnOff = (int) $on;
        parent::__construct('Channel/OnOffScreen');
    }
}
