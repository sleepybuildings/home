<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class SetCustomPageIndex extends BaseRequest
{
    public function __construct(public int $CustomPageIndex)
    {
        parent::__construct('Channel/SetCustomPageIndex');
    }
}
