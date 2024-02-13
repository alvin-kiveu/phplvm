<?php

namespace Addons\MyAddon\Controllers;

use App\Http\Controllers\Controller;

class MyAddonController extends Controller
{
    public function index()
    {
        return view('myaddon::index');
    }
}
