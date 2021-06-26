<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;;
use Str;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('backend.slider.index',compact('slider'));
    }

    public function create()
    {
        return view('backend.slider.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required | max:255 | min:3',
            'sub_title' => 'required | max:255 | min:3',
        ]);
        $slug = Str::slug($request->title);
            $newImageName = $slug . '-' . $request->file('image')->getClientOriginalName();
            $upload = $request->image->move(public_path('images/slider'),$newImageName);

        Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $newImageName,
        ]);
        notify()->success("Slider Added Successfully !!","Success");
        return redirect('admin/slider');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.form', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'title' => 'required | max:255 | min:3',
            'sub_title' => 'required | max:255 | min:3',
        ]);
        $old_img = Slider::find($id)->image;
        $check = $request->file('image');
        $slug = Str::slug($request->title);

        if(!$check){
            $updateImageName = $old_img;
           
        }else{
            unlink('public/images/slider/'.$old_img);
            $newImageName = $slug . '-' . $request->file('image')->getClientOriginalName();
            $upload = $request->image->move(public_path('images/slider'),$newImageName);
            $updateImageName  = $newImageName;
        }
        Slider::find($id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $updateImageName,
        ]);

       notify()->success("Slider updated Successfully !!","Success");
       return redirect('admin/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider = Slider::find($id);
        $image = 'Public/images/slider/'.$Slider->image;
        if(file_exists($image)){
            unlink($image);
            $Slider->delete();
        }else{
            $Slider->delete();
        }
        return redirect()->back();
    }
}
