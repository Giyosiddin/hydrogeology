<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffController extends Controller
{
    protected $per_page = 15;

    public function all(Request $request)
    {
        if($request->per_page){
            $this->per_page = $request->per_page;
        }
        $vacancies = Staff::with('translations')->paginate($this->per_page);
        return JsonResource::collection($vacancies);
    }

    public function getById($id)
    {
        $vacancy = Staff::with('translations')->findOrFail($id);
        return new JsonResource($vacancy);
    }
}
