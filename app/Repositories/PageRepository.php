<?php
namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Str;
use App\Traits\MakeSlug;


class PageRepository
{
    use MakeSlug;
    public function all()
    {
        $pages = Page::with(['translations' => function($query){
            $query->where('locale','uz');
        }])->paginate(15);
        return view('admin.pages.all', compact('pages'));
    }

    public function store($request)
    {
        $page = new Page();
        $page->slug = $this->createdSlug(Page::class, $request->uz['title']);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/page');
			$page->image = $image;
		}
        $page->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($page) {
            $page->translations()->create([
                'locale' => $key,
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
        });
       return redirect()->route('page.edit',$page->id)->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $post = Page::with('translations')->findOrFail($id);
        return view('admin.pages.edit', compact('post'));
    }

    public function update($request, $id)
    {
        $page = Page::findOrFail($id);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/page');
			$page->image = $image;
		}else{
			$page->image = $request->delete_image;
		}
        $page->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($page) {
            $page->translations()->where('locale',$key)->update([
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
        });
        return back()->with(['msg' => "Page updated successfully!"]);
    }

    public function delete($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('page.all');
    }
}
