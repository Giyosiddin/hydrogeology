<?php
namespace App\Repositories;

use App\Models\Vacancy;
use Illuminate\Support\Str;
use App\Traits\MakeSlug;


class VacancyRepository
{
    use MakeSlug;
    public function all()
    {
        $vacancies = Vacancy::with(['translations' => function($query){
            $query->where('locale','uz');
        }])->paginate(15);
        return view('admin.vacancy.all', compact('vacancies'));
    }

    public function store($request)
    {
        $vacancy = new Vacancy();
        $vacancy->active = is_null($request->active) ? '0' : '1';
        // dd($request->active);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/vacancy');
			$vacancy->image = $image;
		}
        $vacancy->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($vacancy) {
            $vacancy->translations()->create([
                'locale' => $key,
                'salary' => $item['salary'],
                'description' => $item['description'],
                'position' => $item['position'],
                'body' => $item['body']
            ]);
        });
       return redirect()->route('vacancy.all')->with(['msg' => "Post saved successfully!"]);
    }

    public function edit($id)
    {
        $post = Vacancy::with('translations')->findOrFail($id);
        return view('admin.vacancy.edit', compact('post'));
    }

    public function update($request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        if($request->hasFile('image')){
			$image = $request->file('image')->store('public/vacancy');
			$vacancy->image = $image;
		}else{
			$vacancy->image = $request->delete_image;
		}
        $vacancy->active = is_null($request->active) ? '0' : '1';
        $vacancy->save();
        $request->collect(['uz','ru','en'])->each(function ($item, $key) use($vacancy) {
            $vacancy->translations()->where('locale',$key)->update([
                'salary' => $item['salary'],
                'description' => $item['description'],
                'position' => $item['position'],
                'body' => $item['body']
            ]);
        });
        return redirect()->route('vacancy.all')->with(['msg' => "Vacancy updated successfully!"]);
    }

    public function delete($id)
    {
        $staff = Vacancy::findOrFail($id);
        $staff->delete();
        return redirect()->route('vacancy.all');
    }
}
