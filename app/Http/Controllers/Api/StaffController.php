<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffController extends Controller
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
        $vacancies = Staff::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->orderBy('order', 'asc')->paginate($this->per_page);
        return JsonResource::collection($vacancies);
    }

    public function getById(Request $request, $id)
    {
        if($request->lang){
            $this->locale = $request->lang;
        }
        $vacancy = Staff::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->findOrFail($id);
        return new JsonResource($vacancy);
    }
}
