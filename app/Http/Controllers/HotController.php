<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotController extends BaseController
{
    # Горящие туры из Алматы
    public function almaty()
    {
        $title = 'Горящие туры из Алматы';
        $hotTours = $this->getHotTours('', '0');
        return view('hot.index', compact('title', 'hotTours'));
    }

    # Горящие туры из Нур-Султан (Астаны)
    public function nurSultan()
    {
        $title = 'Горящие туры из Нур-Султан (Астаны)';
        return view('hot.index', compact('title'));
    }

    # Горящие туры из Актобе
    public function aktobe()
    {
        $title = 'Горящие туры из Актобе';
        return view('hot.index', compact('title'));
    }
}
