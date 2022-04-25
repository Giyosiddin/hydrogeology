<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
{
    protected $locale = 'uz';

    public function getBySlug(Request $request, $slug)
    {
        if($request->lang){
            $this->locale = $request->lang;
        }
        $page = Page::whereSlug($slug)->with('translations', function($query){
            $query->where('locale', '=', $this->locale);
        })->get()->toArray();
        return $page;
    }
}
