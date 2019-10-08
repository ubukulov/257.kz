<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    # О компании
    public function about()
    {
        $page = Page::findOrFail(7);
        return view('company.about', compact('page'));
    }
}
