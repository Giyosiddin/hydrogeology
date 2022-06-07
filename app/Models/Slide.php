<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    use HasFactory;
    protected $appends = ['imageUrl'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
