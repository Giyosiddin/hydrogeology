<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $guarded = [];

    public function translations()
    {
        return $this->hasMany(StaffTranslation::class);
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
