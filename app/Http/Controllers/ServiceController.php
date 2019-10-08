<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    # Услуги
    public function index()
    {
        $pages = Page::all();
        return view('services.index', compact('pages'));
    }

    # Авиабилеты
    public function aviabilety()
    {
        $page = Page::findOrFail(1);
        return view('services.avia', compact('page'));
    }

    # Страхование
    public function strahovanie()
    {
        $page = Page::findOrFail(2);
        return view('services.insurance', compact('page'));
    }

    # Рассрочка
    public function rassrochka()
    {
        $page = Page::findOrFail(3);
        return view('services.credit', compact('page'));
    }

    # Ограничение на выезд
    public function ogranichenieNaVyezd()
    {
        $page = Page::findOrFail(4);
        return view('services.closed', compact('page'));
    }

    # Способы оплаты
    public function sposobyOplaty()
    {
        $page = Page::findOrFail(5);
        return view('services.pay', compact('page'));
    }

    # Бонусная карта
    public function bonusnayaKarta()
    {
        $page = Page::findOrFail(6);
        return view('services.bonus', compact('page'));
    }
}
