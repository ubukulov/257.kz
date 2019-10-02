<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function welcome()
    {
        $hotTours = $this->getHotTours();
        $arr_cities = [];
        foreach(json_decode($hotTours) as $hotTour) {
            $arr_cities[] = $hotTour->city;
        }
        $arr_cities = array_unique($arr_cities);
        return view('welcome', compact('hotTours', 'arr_cities'));
    }
}
