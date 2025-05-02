<?php

namespace App\Domains\Homepage\Repositories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Collection;

class SiteRepository
{
    /**
     * @return Collection<array-key, Site>
     */
    public function getSortedSites(): Collection
    {
        return Site::query()
            ->with('media')
            ->orderBy('sort_index')
            ->get();
    }
}
