<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOMeta;

trait SEOTrait
{
    protected function seo( $pageSEO ){

        SEOMeta::setTitle( $pageSEO['title'] );
        SEOMeta::setDescription($pageSEO['description'] );
        SEOMeta::setKeywords( $pageSEO['keywords'] );

    }
}
