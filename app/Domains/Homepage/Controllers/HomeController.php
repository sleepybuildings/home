<?php

namespace App\Domains\Homepage\Controllers;

use App\Domains\Homepage\Data\SiteData;
use App\Domains\Homepage\Repositories\SiteRepository;
use Inertia\Inertia;

class HomeController
{
    /**
     * Shows the homepage
     */
    public function __invoke(SiteRepository $siteRepository): \Inertia\Response
    {
        return Inertia::render('Homepage/index', [
            'sites' => SiteData::collect($siteRepository->getSortedSites()),
        ]);
    }
}
