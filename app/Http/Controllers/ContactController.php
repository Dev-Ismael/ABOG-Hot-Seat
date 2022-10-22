<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SEOTrait;
use App\Models\SeoManagement;

class ContactController extends Controller
{
    use SEOTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get Seo Management Row
        $pageSEO = SeoManagement::where('id', 1 )->first();

        // SEO Trait
        $this->seo($pageSEO->about);

        return view('contact');
    }
}
