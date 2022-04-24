<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DecisionResource;
use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    protected $per_page = 15;
    public function all(Request $request)
    {
        if($request->per_page){
            $this->per_page = $request->per_page;
        }
        $vacancies = Decision::with('translations')->paginate($this->per_page);
        return DecisionResource::collection($vacancies);
    }

    public function getBySlug($slug)
    {
        $vacancy = Decision::whereSlug($slug)->with('translations')->firstOrFail();
        return new DecisionResource($vacancy);
    }
}
