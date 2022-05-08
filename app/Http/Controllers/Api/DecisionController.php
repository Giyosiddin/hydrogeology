<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DecisionResource;
use App\Models\Decision;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DecisionController extends Controller
{
    protected $per_page = 15;
    protected $locale = 'uz';
    public function all(Request $request)
    {
        if($request->per_page){
            $this->per_page = $request->per_page;
        }
        if($request->lang){
            $this->locale = $request->lang;
        }
        $decisions = Decision::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->paginate($this->per_page);
        return JsonResource::collection($decisions);
    }

    public function getBySlug(Request $request, $slug)
    {
        if($request->lang){
            $this->locale = $request->lang;
        }
        $decision = Decision::whereSlug($slug)->with('translations', function($query){
            $query->where('locale', '=', $this->locale);
        })->firstOrFail();
        return new JsonResource($decision);
    }
}
