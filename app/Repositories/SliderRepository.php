<?php

namespace App\Repositories;

use App\Models\Slide;

class SliderRepository
{
    public function all()
    {
        $slides = Slide::paginate(15);
        return view('admin.slides.all', compact('slides'));
    }

    public function store($request)
    {
        $slide = new Slide();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/gallary');
            $slide->image = $image;
        }
        $slide->url = $request->url;
        $slide->name_uz = $request->name_uz;
        $slide->name_ru = $request->name_ru;
        $slide->name_en = $request->name_en;
        $slide->save();
        return redirect()->route('slider.all')->with(['msg' => "Slide saved successfully!"]);
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slides.edit', compact('slide'));
    }

    public function update($request, $id)
    {
        $slide = Slide::findOrFail($id);
        if($request->hasFile('image')){
            $slide->image = $request->file('image')->store('public/gallary');
        }
        $slide->url = $request->url;
        $slide->name_uz = $request->name_uz;
        $slide->name_ru = $request->name_ru;
        $slide->name_en = $request->name_en;

        $slide->save();
        return redirect()->route('slider.all')->with(['msg' => "Slide updated successfully!"]);
    }

    public function delete($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect()->route('slider.all');
    }
}
