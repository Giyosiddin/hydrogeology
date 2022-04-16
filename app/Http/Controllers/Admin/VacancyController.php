<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacancyRequest;
use App\Repositories\VacancyRepository;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    private $vacancyRepository;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    public function getAll()
    {
        return $this->vacancyRepository->all();
    }

    public function create()
    {
        return view('admin.vacancy.create');
    }

    public function store(VacancyRequest $request)
    {
        return $this->vacancyRepository->store($request);
    }

    public function edit($id)
    {
        return $this->vacancyRepository->edit($id);
    }

    public function update(VacancyRequest $request, $id)
    {
        return $this->vacancyRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->vacancyRepository->delete($id);
    }
}
