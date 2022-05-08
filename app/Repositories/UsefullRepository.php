<?php
namespace App\Repositories;

use App\Models\UsefulResource;
use Illuminate\Support\Str;


class UsefullRepository
{

    public function all()
    {
        $resources = UsefulResource::paginate(15);
        return view('admin.usefull.all', compact('resources'));
    }

    public function store($request)
    {
        $resource = new UsefulResource();

        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/usefull-resources');
			$resource->icon = $image;
		}
        $resource->name = $request->name;
        $resource->url = $request->url;
        $resource->save();
       return redirect()->route('usefull.all',)->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $resource = UsefulResource::findOrFail($id);
        return view('admin.usefull.edit', compact('resource'));
    }

    public function update($request, $id)
    {
        $resource = UsefulResource::findOrFail($id);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/usefull-resources');
			$resource->icon = $image;
		}else{
			$resource->icon = $request->delete_image;
		}
        $resource->name = $request->name;
        $resource->url = $request->url;
        $resource->save();
        return back()->with(['msg' => "Usefull Resource updated successfully!"]);
    }

    public function delete($id)
    {
        $resource = UsefulResource::findOrFail($id);
        $resource->delete();
        return redirect()->route('usefull.all');
    }
}
