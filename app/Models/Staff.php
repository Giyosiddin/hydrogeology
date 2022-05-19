<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $appends = ['imageUrl'];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

    public function translations()
    {
        return $this->hasMany(StaffTranslation::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($staff) {
            $staff->translations()->each(function($translation) {
                $translation->delete();
             });
        });
    }
}
