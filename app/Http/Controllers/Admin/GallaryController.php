<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GallaryRepository;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    private $gallaryRepository;

    public function __construct(GallaryRepository $gallaryRepository)
    {
        $this->gallaryRepository = $gallaryRepository;
    }

    public function getAll()
    {
        return $this->gallaryRepository->all();
    }

    public function create()
    {
        return view('admin.gallaries.create');
    }

    public function store(Request $request)
    {
        return $this->gallaryRepository->store($request);
    }

    public function edit($id)
    {
        return $this->gallaryRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->gallaryRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->gallaryRepository->delete($id);
    }
}
