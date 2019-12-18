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
        $this->seo()->setTitle('Авиабилеты');
        $page = Page::findOrFail(1);
        return view('services.avia', compact('page'));
    }

    # Страхование
    public function strahovanie()
    {
        $this->seo()->setTitle('Страхование');
        $page = Page::findOrFail(2);
        return view('services.insurance', compact('page'));
    }

    # Рассрочка
    public function rassrochka()
    {
        $this->seo()->setTitle('Рассрочка');
        $page = Page::findOrFail(3);
        return view('services.credit', compact('page'));
    }

    # Ограничение на выезд
    public function ogranichenieNaVyezd()
    {
        $this->seo()->setTitle('Ограничение на выезд');
        $page = Page::findOrFail(4);
        return view('services.closed', compact('page'));
    }

    # Способы оплаты
    public function sposobyOplaty()
    {
        $this->seo()->setTitle('Способы оплаты');
        $page = Page::findOrFail(5);
        return view('services.pay', compact('page'));
    }

    # Бонусная карта
    public function bonusnayaKarta()
    {
        $this->seo()->setTitle('Бонусная карта');
        $page = Page::findOrFail(6);
        return view('services.bonus', compact('page'));
    }
}
