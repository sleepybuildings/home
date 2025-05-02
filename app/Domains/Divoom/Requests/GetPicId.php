<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class GetPicId extends BaseRequest
{
    public function __construct()
    {
        parent::__construct('Draw/GetHttpGifId');
    }
}
