<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
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
        $vacancies = Vacancy::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->orderByDesc('id')->paginate($this->per_page);
        return VacancyResource::collection($vacancies);
    }

    public function getById(Request $request, $id)
    {
        if($request->lang){
            $this->locale = $request->lang;
        }
        $vacancy = Vacancy::with(['translations' => function($query){
            $query->where('locale', '=', $this->locale);
        }])->findOrFail($id);
        return new VacancyResource($vacancy);
    }

}
