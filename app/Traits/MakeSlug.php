<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait MakeSlug
{
    public function createdSlug($model, $name)
    {
        // $name = Str::limit($name, 25);
        $slug = Str::slug($name);
        if ($model::whereSlug($slug)->exists()) {

            $max = $model::whereRelation('translations','title',$name)->latest('id')->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {

                $new_slug = preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
                return $new_slug;
            }
            return "{$slug}-2";
        }
        return $slug;

    }
}
