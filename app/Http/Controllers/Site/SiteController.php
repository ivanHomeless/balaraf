<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('site.index', compact('page'));
    }


}
