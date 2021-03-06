<?php

namespace App\Models;

// use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $appends = ['imageUrl'];

    // protected $guarded;
    protected $fillable = [
        'image',
        'view',
        'slug'
    ];

    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
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
