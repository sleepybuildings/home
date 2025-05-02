<?php

namespace App\Domains\Homepage\Data;

use App\Models\Site;
use Spatie\LaravelData\Data;

class SiteData extends Data
{
    public function __construct(
        public string $name,
        public string $url,
        public string $iconUrl
    ) {}

    public static function fromModel(Site $site): self
    {
        return new self(
            $site->name,
            $site->url,
            $site->getFirstMediaUrl(),
        );
    }
}
