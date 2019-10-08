<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Currency;
use Illuminate\Http\Request;
use Cache;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        View::share('cities', $this->getCities());
        View::share('currency', $this->getCurrency());
    }

    /**
     * Горящие туры
     * @param $country string
     * @param $city string
     * @return object
     */
    public function getHotTours($country = '', $city = '')
    {
        if (Cache::has('hot_tours')) {
            $result = Cache::get('hot_tours');
        } else {
            $url = 'https://www.afinadb.kz/export.php?'.$country.$city;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = json_decode(curl_exec($ch),true);
            curl_close($ch);
            Cache::put('hot_tours', $result, 1800); // храним в кэше 30 мин
        }

        return json_encode($result);
    }

    /**
     * список городов
     * @return string
     */
    public function getCities()
    {
        if (Cache::has('cities')) {
            $cities = Cache::get('cities');
        } else {
            $cities = City::all();
            Cache::put('cities', $cities, 2592000); // храним в кэше 30 дней
        }

        return json_encode($cities);
    }

    public function getCurrency()
    {
        if (Cache::has('currency')) {
            $currency = Cache::get('currency');
        } else {
            $currency = Currency::findOrFail(1);
            Cache::put('currency', json_encode($currency), 1800);
        }

        return $currency;
    }
}
