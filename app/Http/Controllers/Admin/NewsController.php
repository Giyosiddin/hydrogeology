<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function getAll()
    {
        return $this->newsRepository->all();
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        return $this->newsRepository->store($request);
    }

    public function edit($id)
    {
        return $this->newsRepository->edit($id);
    }

    public function update(NewsRequest $request, $id)
    {
        return $this->newsRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->newsRepository->delete($id);
    }
}
