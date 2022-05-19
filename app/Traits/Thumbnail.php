<?php

namespace App\Traits;

use Gumlet\ImageResize;
use Illuminate\Support\Facades\Storage;

class Thumbnail
{
    public function makeThumbnail($image_o, $path)
    {
        $file = $image_o->store($path);
        $image = new ImageResize($file);
        $per25 = $image->scale(25);
        $large = $per25->save('scale1.jpg');
//        $path1 = Storage::putFile($path, $per25);
        $per50 = $image->scale(50);
        $medium = $per50->save('scale2.jpg');
//        $path2 = Storage::putFile($path, $per50);
        $per75 = $image->scale(75);
        $small = $per75->save('scale3.jpg');
//        $path3 = Storage::putFile($path, $path3);
        dd($large, $medium, $small);
//        $image = Storage::put();
    }
}
