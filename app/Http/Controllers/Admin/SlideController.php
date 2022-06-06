<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getAll()
    {
        return $this->sliderRepository->all();
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'name_uz' => 'required|string',
            'image' => 'required',
        ]);
        return $this->sliderRepository->store($request);
    }

    public function edit($id)
    {
        return $this->sliderRepository->edit($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'name_uz' => 'required|string',
//            'image' => 'required',
        ]);
        return $this->sliderRepository->update($request, $id);
    }
    public function delete($id)
    {
        return $this->sliderRepository->delete($id);
    }
}
