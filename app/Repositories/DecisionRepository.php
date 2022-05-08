<?php
namespace App\Repositories;

use App\Models\Decision;
use Illuminate\Support\Str;
use App\Traits\MakeSlug;


class DecisionRepository
{
    use MakeSlug;
    public function all()
    {
        $decisions = Decision::with(['translations' => function($query){
            $query->where('locale','uz');
        }])->paginate(15);
        return view('admin.decision.all', compact('decisions'));
    }

    public function store($request)
    {
        $decision = new Decision();
        // dd($this->createdSlug(Decision::class, $request->uz['title']));
        $decision->slug = $this->createdSlug(Decision::class, $request->uz['title']);
        $decision->number_decision = $request->number_decision ? $request->number_decision : '';
        // Upload image
        // if($request->hasFile('image')){
		// 	$image = $request->file('image')->store('public/decision');
		// 	$decision->image = $image;
		// }
        $decision->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($decision) {
            $decision->translations()->create([
                'locale' => $key,
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
        });
       return redirect()->route('decision.all')->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $post = Decision::with('translations')->findOrFail($id);
        return view('admin.decision.edit', compact('post'));
    }

    public function update($request, $id)
    {
        $decision = Decision::findOrFail($id);
        // $decision->slug = $request->slug;

        // if($request->hasFile('image')){
		// 	$image = $request->file('image')->store('public/decision');
		// 	$decision->image = $image;
		// }else{
		// 	$decision->image = $request->delete_image;
		// }
        $decision->number_decision = $request->number_decision ? $request->number_decision :'';
        $decision->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($decision) {
            $decision->translations()->where('locale',$key)->update([
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
        });
        return back()->with(['msg' => "Decision updated successfully!"]);
    }

    public function delete($id)
    {
        $decision = Decision::findOrFail($id);
        $decision->delete();
        return redirect()->route('decision.all');
    }
}
