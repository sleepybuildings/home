<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class GetConfig extends BaseRequest
{
    public function __construct(
    ) {
        parent::__construct('Channel/GetAllConf');
    }
}
