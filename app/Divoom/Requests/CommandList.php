<?php

namespace App\Divoom\Requests;

use App\Divoom\BaseRequest;

class CommandList extends BaseRequest
{
    /**
     * @param  array<array-key, BaseRequest>  $CommandList
     */
    public function __construct(
        public array $CommandList
    ) {
        parent::__construct('Draw/CommandList');
    }
}
