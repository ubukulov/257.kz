<?php
// Главная
Breadcrumbs::register('homepage', function ($breadcrumbs) {
    $breadcrumbs->push('257.kz', route('home'));
});

// Услуги
Breadcrumbs::register('service.show', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('homepage');
    if (\Route::currentRouteName() == 'service.index') {
        $breadcrumbs->push($page->title);
    } else {
        $breadcrumbs->push('Услуги', route('service.index'));
        $breadcrumbs->push($page->title);
    }
});

// О нас
Breadcrumbs::register('company.show', function ($breadcrumbs, $page = null, $title = '') {
    $breadcrumbs->parent('homepage');
    if ($page) {
        $breadcrumbs->push($page->title);
    } else {
        $breadcrumbs->push($title);
    }
});

// Горящие туры
Breadcrumbs::register('hot.show', function ($breadcrumbs, $title = null) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($title);
});

// Страны
Breadcrumbs::register('countries', function ($breadcrumbs) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Страны');
});

// Стран
Breadcrumbs::register('country.show', function ($breadcrumbs, $country) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('Страны', route('countries'));
    $breadcrumbs->push($country->title);
});