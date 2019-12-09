<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Franchise;

class FranchiseController extends Controller
{

    protected $imagePath = 'uploads/franchises/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franchises = Franchise::where(['active' => 1])->get();
        return view('admin.franchise.index', compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchise.create');
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
        $franchise = Franchise::create($data);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $franchise->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            $franchise->image = $file_name;
            $franchise->save();
        }

        return redirect()->route('admin.franchise.index');
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
        $franchise = Franchise::findOrFail($id);
        return view('admin.franchise.edit', compact('franchise'));
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
        $franchise = Franchise::findOrFail($id);
        $franchise->update($data);
        $franchise->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $img = \Image::make($file->getPathname());
            $hash_name = md5($file->getClientOriginalName());
            $file_name = $franchise->id."_".$hash_name.'.jpg';

            $save_path = base_path('public/'.$this->imagePath);
            $img->save($save_path.$file_name);

            $franchise->image = $file_name;
            $franchise->save();
        }

        return redirect()->route('admin.franchise.index');
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
