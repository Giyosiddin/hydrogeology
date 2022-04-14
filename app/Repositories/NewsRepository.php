<?php
namespace App\Repositories;

use App\Models\News;
use Illuminate\Support\Str;
use App\Traits\MakeSlug;


class NewsRepository
{
    use MakeSlug;
    public function all()
    {
        $news = News::with(['translations' => function($query){
            $query->where('locale','uz');
            // $query->first();
        }])->paginate(15);
        return view('admin.news.all', compact('news'));
    }

    public function store($request)
    {
        $news = new News();
        $news->slug = $this->createdSlug(News::class, $request->uz['title']);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/news');
			$news->image = $image;
		}
        $news->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($news) {
            $news->translations()->create([
                'locale' => $key,
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
        });
       return redirect()->route('news.edit',$news->id)->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $post = News::with('translations')->findOrFail($id);
        return view('admin.news.edit', compact('post'));
    }

    public function update($request, $id)
    {
        $news = News::findOrFail($id);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/news');
			$news->image = $image;
		}else{
			$news->image = $request->delete_image;
		}
        $news->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($news) {
            $trans_update = $news->translations()->where('locale',$key)->update([
                'title' => $item['title'],
                'description' => $item['description'],
                'body' => $item['body']
            ]);
            // dump($trans_update);
            // dd($item);
            // $news->translations()->update([
            //     'locale' => $key,
            //     'title' => $item['title'],
            //     'description' => $item['description'],
            //     'body' => $item['body']
            // ]);
        });
        return back()->with(['msg' => "News updated successfully!"]);
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.all');
    }
}
