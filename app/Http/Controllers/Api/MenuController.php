<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenu($slug)
    {
        $menu = Menu::where('location', $slug)->first();
        $items = MenuItem::orderBy('order', 'ASC')->get()->toTree();
        return $items;
    }
}
