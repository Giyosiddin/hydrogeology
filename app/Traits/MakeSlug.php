<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait MakeSlug
{
    public function createdSlug($model, $name)
    {
        if ($model::whereSlug($slug = Str::slug($name))->exists()) {

            $max = $model::whereRelation('translations','title',$name)->latest('id')->skip(1)->value('slug');
            // $max = $model::whereName($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;

    }
}
