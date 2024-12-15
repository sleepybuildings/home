<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class GetPicId extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('Draw/GetHttpGifId');
    }
}
