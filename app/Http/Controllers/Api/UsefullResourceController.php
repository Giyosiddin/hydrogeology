<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsefulResource;
use Illuminate\Http\Request;

class UsefullResourceController extends Controller
{
    public function resources()
    {
        $resources = UsefulResource::all()->toArray();
        return $resources;
    }
}
