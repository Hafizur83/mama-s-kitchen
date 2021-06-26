<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodItem;
use App\Models\Catagory;
use Auth;;
use Str;

class FoodController extends Controller
{
    public function index()
    {
        $catagories = Catagory::get();
        $FoodItems = FoodItem::latest()->get();
        return view('backend.fooditem.index',compact('FoodItems','catagories'));
    }


    public function create()
    {
        $catagories = Catagory::get();
        return view('backend.fooditem.form', compact('catagories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | max:49 | min:3',
            'body' => 'required | max:49 | min:3',
            'cat_id' => 'required',
            'price' => 'required | max:49',
            'image' => 'required',
        ],[
            'body.required' => 'The Description field is required.',
            'cat_id.required' => 'The Catagory field is required.',
        ]);

            $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $upload = $request->image->move(public_path('images/fooditems'),$newImageName);

        FoodItem::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'body' => $request->body,
            'cat_id' => $request->cat_id,
            'image' => $newImageName,
            'price' => $request->price,
        ]);

        $cat = $request->cat_id;
        Catagory::find($cat)->increment('item_count');

        notify()->success("FoodItem Added Successfully !!","Success");
        return redirect('admin/fooditems');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fooditem = FoodItem::find($id);
        $catagories = Catagory::get();
        return view('backend.fooditem.form', compact(['fooditem','catagories']));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required | max:49 | min:3',
            'body' => 'required | max:49 | min:3',
            'cat_id' => 'required',
            'price' => 'required | max:49',
        ],[
            'body.required' => 'The description field is required.',
            'cat_id.required' => 'The catagory field is required.',
        ]);
        $old_cat = $request->old_cat;
        $old_img = $request->old_img;
        $check = $request->file('image');

        if(!$check){
            $updateImageName = $old_img;
           
        }else{
            unlink('public/images/fooditems/'.$old_img);
            $newImageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $dir = $request->image->move(public_path('images/fooditems/'),$newImageName);
            $updateImageName  = $newImageName;
        }
        FoodItem::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'body' => $request->body,
            'cat_id' => $request->cat_id,
            'image' => $updateImageName,
            'price' => $request->price,
        ]);

        $upcat = $request->cat_id;
       if($old_cat != $upcat){
            $cat = $request->cat_id;
            $data = Catagory::find($cat)->increment('item_count');
            $data2 = Catagory::find($old_cat)->decrement('item_count');
       }
       notify()->success("FoodItem updated Successfully !!","Success");
       return redirect('admin/fooditems');

    }

    public function delete( Request $r , $id){

        $cat_id =  $r->catagory;
        Catagory::find($cat_id)->decrement('item_count');
        $fooditems = FoodItem::find($id);
        $image = 'Public/images/fooditems/'.$fooditems->image;
        if(file_exists($image)){
            unlink($image);
            $fooditems->delete();
        }else{
            $fooditems->delete();
        }
        return redirect()->back();
    }

}
