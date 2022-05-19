<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use drh2so4\Thumbnail\Traits\thumbnail;

class Gallary extends Model
{
    use HasFactory;
    use Thumbnail;
    public $guarded = [];

    protected $appends = ['imageUrl'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

}
