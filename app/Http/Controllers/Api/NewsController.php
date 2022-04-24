<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $perPage = 15;
    public function all(Request $request)
    {
        if($request->input('per_page')){
            $this->perPage = $request->per_page;
        }
        $news = News::with('translations')->paginate($this->perPage);
        // dd($news);
        return NewsResource::collection($news);
    }

    public function getBySlug($slug)
    {
        $news = News::whereSlug($slug)->with('translations')->firstOrFail();
        return new NewsResource($news);
    }
}
