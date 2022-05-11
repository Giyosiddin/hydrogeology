<?php
namespace App\Repositories;

use App\Models\Staff;
use Illuminate\Support\Str;
use App\Traits\MakeSlug;


class StaffRepository
{
    use MakeSlug;
    public function all()
    {
        $staff = Staff::with(['translations' => function($query){
            $query->where('locale','uz');
        }])->paginate(15);
        return view('admin.staff.all', compact('staff'));
    }

    public function store($request)
    {
        $staff = new Staff();
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->phone2 = $request->phone2;
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/staff');
			$staff->image = $image;
		}
        $staff->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($staff) {
            $staff->translations()->create([
                'locale' => $key,
                'fullname' => $item['fullname'],
                'description' => $item['description'],
                'position' => $item['position']
            ]);
        });
       return redirect()->route('staff.all')->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $post = Staff::with('translations')->findOrFail($id);
        return view('admin.staff.edit', compact('post'));
    }

    public function update($request, $id)
    {
        $staff = Staff::findOrFail($id);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/staff');
			$staff->image = $image;
		}else{
			$staff->image = $request->delete_image;
		}
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->phone2 = $request->phone2;
        $staff->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($staff) {
            $staff->translations()->where('locale',$key)->update([
                'fullname' => $item['fullname'],
                'description' => $item['description'],
                'position' => $item['position']
            ]);
        });
        return redirect()->route('staff.all')->with(['msg' => "Staff updated successfully!"]);
    }

    public function delete($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staff.all');
    }
}
