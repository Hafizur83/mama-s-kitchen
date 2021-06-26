<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Catagory;
use Str;

class CatagoryController extends Controller
{

    public function index()
    {
        $catagory = Catagory::latest()->get();
        return view('backend.catagory.index', compact('catagory'));
    }
    public function create()
    {
        return view('backend.catagory.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required|max:55 | min:3',
        ],[
            'cat_name.required' => 'The Catagory name field is required.'
        ]);
        Catagory::create([
            'cat_name' => $request->cat_name,
            'slug' => Str::slug($request->cat_name),
        ]);
        notify()->success("Catagory add successfully","Success");
        return redirect()->route('catagory.index');
    }

    public function edit($id)
    {
        $catagory = catagory::find($id);
        return view('backend.catagory.form', compact('catagory'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'cat_name' => 'required|max:55 | min:3',
        ],[
            'cat_name.required' => 'The Catagory name field is required.'
        ]);

        Catagory::find($id)->update([
            'cat_name' => $request->cat_name,
            'slug' => Str::slug($request->cat_name),
        ]);

        notify()->success("Catagory Updated Successfully !!","Success");
        return redirect()->route('catagory.index');
    }

    public function destroy($id)
    {
        Catagory::where('id',$id)->delete();
        return redirect()->back();
    }
}
