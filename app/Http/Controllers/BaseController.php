<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getHotTours()
    {
        $COUNTRY_ = '';
        $CITY_ = '';
        $url = 'https://www.afinadb.kz/export.php?'.$COUNTRY_.$CITY_;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = json_decode(curl_exec($ch),true);//
        curl_close($ch);
        return json_encode($res);
    }
}
