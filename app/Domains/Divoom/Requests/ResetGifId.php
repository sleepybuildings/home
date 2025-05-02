<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class ResetGifId extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('Draw/ResetHttpGifId');
    }
}
