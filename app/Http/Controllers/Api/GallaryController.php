<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GallaryController extends Controller
{
    protected $perPage = 15;
    public function images(Request $request)
    {
        if($request->input('per_page')){
            $this->perPage = $request->per_page;
        }
        $images = Gallary::where('type_gallary','image')->paginate($this->perPage);
        return new JsonResource($images);
    }

    public function videos(Request $request)
    {
        if($request->input('per_page')){
            $this->perPage = $request->per_page;
        }
        $videos = Gallary::where('type_gallary','video')->paginate($this->perPage);
        return  new JsonResource($videos);
    }
}
