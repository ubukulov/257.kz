<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franchise;
use Cookie;

class IndexController extends BaseController
{
    public function welcome()
    {
        $this->seo()->setTitle('Турфирма 257 в Казахстане');
        $hotTours = $this->getHotTours();
        $arr_cities = [];
        foreach(json_decode($hotTours) as $hotTour) {
            $arr_cities[] = $hotTour->city;
        }
        $arr_cities = array_unique($arr_cities);
        $franchises = Franchise::where(['active' => 1])->get();
        return view('welcome', compact( 'arr_cities', 'franchises'));
    }

    public function franchisingTerms()
    {
        return view('franchising-terms');
    }

    public function getHotToursList()
    {
        $hotTours = $this->getHotTours();
        return $hotTours;
    }

    public function changeCity(Request $request)
    {
        $city_id = $request->input('city_id');
        $_SESSION['selected_city'] = $city_id;
        return response('Город успешно выбрано');
    }

    public function changeCurrency(Request $request)
    {
        $currency = $request->input('curr');
        $_SESSION['selected_currency'] = $currency;
        return response('Валюта успешно выбрано');
    }
}
