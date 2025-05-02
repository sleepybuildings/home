<?php

namespace App\Domains\Divoom\Requests;

use App\Domains\Divoom\BaseRequest;

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
