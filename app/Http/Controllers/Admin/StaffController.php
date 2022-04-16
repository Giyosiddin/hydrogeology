<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Repositories\StaffRepository;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    private $staffRepository;

    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function getAll()
    {
        return $this->staffRepository->all();
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(StaffRequest $request)
    {
        return $this->staffRepository->store($request);
    }

    public function edit($id)
    {
        return $this->staffRepository->edit($id);
    }

    public function update(StaffRequest $request, $id)
    {
        return $this->staffRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->staffRepository->delete($id);
    }
}
