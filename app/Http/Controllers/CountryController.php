<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends BaseController
{
    public function countries()
    {
        $this->seo()->setTitle('Отдых за рубежом');
        $countries = Country::whereNotNull('short_description')->get();
        return view('country.index', compact('countries'));
    }

    public function country($alias)
    {
        $country = Country::whereAlias($alias)->first();
        if ($country) {
            return view('country.show', compact('country'));
        } else {
            abort(404);
        }
    }
}
