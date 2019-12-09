<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function contacts()
    {
        $franchises = Franchise::where(['active' => 1])->get();
        return view('company.contacts', compact('franchises'));
    }
}
