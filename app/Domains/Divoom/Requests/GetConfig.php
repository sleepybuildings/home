<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

class GetConfig extends BaseRequest
{
    public function __construct(
    ) {
        parent::__construct('Channel/GetAllConf');
    }
}
