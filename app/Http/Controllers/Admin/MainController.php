<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index()
    {
        return view('admin.index');
    }
}
