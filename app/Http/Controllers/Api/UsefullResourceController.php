<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsefulResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsefullResourceController extends Controller
{
    public function resources()
    {
        $resources = UsefulResource::all()->toArray();
        return new JsonResource($resources);
    }
}
