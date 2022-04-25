<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UsefullRepository;

class UsefulResourceController extends Controller
{
    private $usefullRepository;

    public function __construct(UsefullRepository $usefullRepository)
    {
        $this->usefullRepository = $usefullRepository;
    }

    public function getAll()
    {
        return $this->usefullRepository->all();
    }

    public function create()
    {
        return view('admin.usefull.create');
    }

    public function store(Request $request)
    {
        return $this->usefullRepository->store($request);
    }

    public function edit($id)
    {
        return $this->usefullRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->usefullRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->usefullRepository->delete($id);
    }
}
