<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $appends = ['imageUrl'];


    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($news) {
             $news->translations()->each(function($translation) {
                $translation->delete();
             });
        });
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
