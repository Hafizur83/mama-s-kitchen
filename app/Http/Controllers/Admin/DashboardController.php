<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\FoodItem;
use App\Models\Catagory;
use App\Models\Slider;
use App\Models\Contact;


class DashboardController extends Controller
{
    public function index(){
        $reservation = Reservation::where('status',false)->latest()->get();
        $catagories = Catagory::count();
        $FoodItems = FoodItem::count();
        $reservationcount = Reservation::where('status',false)->count();
        $slider = Slider::count();
        $contact = Contact::count();
        return view('backend.dashboard', compact('reservation','catagories','FoodItems','reservationcount','slider','contact'));
    }

    
}
