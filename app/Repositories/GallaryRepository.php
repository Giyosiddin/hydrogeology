<?php
namespace App\Repositories;

use App\Models\Gallary;

class GallaryRepository
{
    public function all()
    {
        $image_gallaries = Gallary::where('type_gallary', 'image')->paginate(15);
        $video_gallaries = Gallary::where('type_gallary', 'video')->paginate(15);
        return view('admin.gallaries.all', compact('image_gallaries','video_gallaries'));
    }

    public function store($request)
    {
        $gallary = new Gallary();
        if($request->hasFile('image')){
            $gallary->image = $request->file('image')->store('public/gallary');
        }

        $gallary->url = $request->url;
        $gallary->type_gallary = $request->type_gallary;

        $gallary->save();
       return redirect()->route('gallary.edit',$gallary->id)->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $gallary = Gallary::findOrFail($id);
        return view('admin.gallaries.edit', compact('gallary'));
    }

    public function update($request, $id)
    {
        $gallary = Gallary::findOrFail($id);
        if($request->hasFile('image')){
            $gallary->image = $request->file('image')->store('public/gallary');
        }
        $gallary->url = $request->url;
        $gallary->type_gallary = $request->type_gallary;

        $gallary->save();
        return back()->with(['msg' => "Staff updated successfully!"]);
    }

    public function delete($id)
    {
        $gallary = Gallary::findOrFail($id);
        $gallary->delete();
        return redirect()->route('gallary.all');
    }
}
