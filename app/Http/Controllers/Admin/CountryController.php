<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    protected $imagePath = 'uploads/countries/';
    protected $imagePathThumbs = '/uploads/countries/thumbs/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('file');
        $data['short_description'] = $data['description'];
        $country = Country::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $file_name = $country->alias.'.png';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(300, 300)->save($save_path_thumbs.$file_name);

            $country->flag = $file_name;
            $country->save();
        }

        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('file');
        $data['short_description'] = $data['description'];
        $country = Country::findOrFail($id);
        $country->update($data);
        $country->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $file_name = $country->alias.'.png';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            // сохранение миниатюры

            $save_path_thumbs = base_path('public/'.$this->imagePathThumbs);

            $img->resize(300, 300)->save($save_path_thumbs.$file_name);

            $country->flag = $file_name;
            $country->save();
        }

        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
