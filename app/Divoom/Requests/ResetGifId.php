<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class ResetGifId extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('Draw/ResetHttpGifId');
    }
}
