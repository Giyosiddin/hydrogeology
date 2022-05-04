<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class MenuItem extends Model
{
    use HasFactory;
    use NodeTrait;

    // protected $appends = ['parent','children'];

    protected $with = ['children'];

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    // public function getParentAttribute()
    // {
    //     return $this->parent();
    // }

    // public function getChildrenAttribute()
    // {
    //     return $this->children();
    // }


}
