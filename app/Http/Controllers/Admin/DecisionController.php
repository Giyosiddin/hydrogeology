<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\DecisionRepository;
use App\Http\Requests\DecisionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    private $decisionRepository;

    public function __construct(DecisionRepository $decisionRepository)
    {
        $this->decisionRepository = $decisionRepository;
    }

    public function getAll()
    {
        return $this->decisionRepository->all();
    }

    public function create()
    {
        return view('admin.decision.create');
    }

    public function store(DecisionRequest $request)
    {
        return $this->decisionRepository->store($request);
    }

    public function edit($id)
    {
        return $this->decisionRepository->edit($id);
    }

    public function update(DecisionRequest $request, $id)
    {
        // dd($request->all());
        return $this->decisionRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->decisionRepository->delete($id);
    }
}
