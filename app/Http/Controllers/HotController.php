<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotController extends BaseController
{
    # Горящие туры из Алматы
    public function almaty()
    {
        $title = 'Горящие туры из Алматы';
        $this->seo()->setTitle($title);
        $hotTours = $this->getHotTours('', 0);
        return view('hot.index', compact('hotTours', 'title'));
    }

    # Горящие туры из Нур-Султан (Астаны)
    public function nurSultan()
    {
        $title = 'Горящие туры из Нур-Султан (Астаны)';
        $this->seo()->setTitle($title);
        $hotTours = $this->getHotTours('', 1);
        return view('hot.index', compact('title', 'hotTours'));
    }

    # Горящие туры из Актобе
    public function aktobe()
    {
        $title = 'Горящие туры из Актобе';
        $this->seo()->setTitle($title);
        $hotTours = $this->getHotTours('', 5);
        return view('hot.index', compact('title', 'hotTours'));
    }
}
