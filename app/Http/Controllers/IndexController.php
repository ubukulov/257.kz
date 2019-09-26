<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function welcome()
    {
        $hotTours = $this->getHotTours();
        return view('welcome', compact('hotTours'));
    }
}
