<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function getAll()
    {
        return $this->pageRepository->all();
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageRequest $request)
    {
        return $this->pageRepository->store($request);
    }

    public function edit($id)
    {
        return $this->pageRepository->edit($id);
    }

    public function update(PageRequest $request, $id)
    {
        return $this->pageRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->pageRepository->delete($id);
    }
}
