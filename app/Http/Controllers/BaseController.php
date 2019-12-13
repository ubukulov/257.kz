<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use Cache;
use View;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BaseController extends Controller
{
    use SEOToolsTrait;

    protected $currencies = [
        0 => 'kzt',
        1 => 'usd',
        2 => 'eur'
    ];

    public function __construct()
    {
        View::share('cities', $this->getCities());
        View::share('currency', $this->getCurrency());
        View::share('countries', $this->getCountries());
        session_start();
        if (!isset($_SESSION['selected_city'])) {
            $_SESSION['selected_city'] = 1;
        }
        if (!isset($_SESSION['selected_currency'])) {
            $_SESSION['selected_currency'] = 0;
        }
        View::share('selected_city', $_SESSION['selected_city']);
        View::share('selected_currency', $_SESSION['selected_currency']);
        View::share('currencies', $this->currencies);
    }

    /**
     * Горящие туры
     * @return object
     */
    public function getHotTours()
    {
        if (isset($_GET['country']) && !isset($_GET['city'])) {
            $url = 'https://old.afinadb.kz/export.php?country='.$_GET['country'];
        } elseif (isset($_GET['city']) && !isset($_GET['country'])) {
            $url = 'https://old.afinadb.kz/export.php?city='.$_GET['city'];
        } elseif (isset($_GET['city']) && isset($_GET['country'])) {
            $url = 'https://old.afinadb.kz/export.php?country='.$_GET['country'].'&city='.$_GET['city'];
        } else {
            $url = 'https://old.afinadb.kz/export.php';
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch),true);
        curl_close($ch);

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

    public function getCountries()
    {
        /*if (Cache::has('countries')) {
            $countries = Cache::get('countries');
        } else {
            $countries = Country::all();
            Cache::put('countries', $countries, 2592000);
        }*/
        return Country::all();
    }
}
