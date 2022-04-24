<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacancyResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    protected $per_page = 15;
    public function all(Request $request)
    {
        if($request->per_page){
            $this->per_page = $request->per_page;
        }
        $vacancies = Vacancy::with('translations')->paginate($this->per_page);
        return VacancyResource::collection($vacancies);
    }

    public function getById($id)
    {
        $vacancy = Vacancy::with('translations')->findOrFail($id);
        return new VacancyResource($vacancy);
    }

}
