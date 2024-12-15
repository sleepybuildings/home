<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class SetCustomPageIndex extends BaseRequest
{
    public function __construct(public int $CustomPageIndex)
    {
        parent::__construct('Channel/SetCustomPageIndex');
    }
}
