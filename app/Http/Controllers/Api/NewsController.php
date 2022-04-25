<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $perPage = 15;
    protected $locale = 'uz';
    public function all(Request $request)
    {
        if($request->input('per_page')){
            $this->perPage = $request->per_page;
        }
        if($request->lang){
            $this->locale = $request->lang;
        }
        $news = News::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->paginate($this->perPage);
        return NewsResource::collection($news);
    }

    public function getBySlug(Request $request, $slug)
    {
        if($request->lang){
            $this->locale = $request->lang;
        }
        $news = News::whereSlug($slug)->with('translations', function($query){
            $query->where('locale', '=', $this->locale);
        })->firstOrFail();
        return new NewsResource($news);
    }
}
