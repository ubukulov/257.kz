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
Breadcrumbs::register('company.show', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push('О нас', route('service.index'));
    $breadcrumbs->push($page->title);
});

// Горящие туры
Breadcrumbs::register('hot.show', function ($breadcrumbs, $title = null) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($title);
});
