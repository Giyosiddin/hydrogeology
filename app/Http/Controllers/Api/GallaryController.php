<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function images()
    {
        $images = Gallary::where('type_gallary','image')->get()->toArray();
        return $images;
    }

    public function videos()
    {
        $videos = Gallary::where('type_gallary','video')->get()->toArray();
        return $videos;
    }
}
