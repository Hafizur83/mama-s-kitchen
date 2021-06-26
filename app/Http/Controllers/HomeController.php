<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Catagory;
use App\Models\FoodItem;
use App\Models\Reservation;

class HomeController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::latest()->get();
        $catagories = Catagory::latest()->where('item_count','>', '0')->get();
        $fooditems = FoodItem::latest()->get();
        return view('welcome',compact(['sliders','catagories','fooditems']));
    }

    public function reservation(Request $r){
        Reservation::create([
            'name' => $r->name,
            'phone' => $r->phone,
            'email' => $r->email,
            'date_and_time' => $r->date_and_time,
            'message' => $r->message,
            'status' => false
        ]);

        notify()->success("Reservation Send Successfully !!","Success");
        return redirect()->back();
    }
}

