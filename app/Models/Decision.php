<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Decision extends Model
{
    use HasFactory;

    protected $guarded = ['*'];

    protected $appends = ['imageUrl'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function translations()
    {
        return $this->hasMany(DecisionTranslation::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($news) {
             $news->translations()->each(function($translation) {
                $translation->delete();
             });
        });
    }
}
