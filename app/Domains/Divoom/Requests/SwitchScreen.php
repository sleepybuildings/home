<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class SwitchScreen extends BaseRequest
{
    public readonly int $OnOff;

    public function __construct(bool $on)
    {
        $this->OnOff = (int) $on;
        parent::__construct('Channel/OnOffScreen');
    }
}
