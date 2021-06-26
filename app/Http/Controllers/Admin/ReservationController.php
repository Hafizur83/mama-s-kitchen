<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::latest()->get();
        return view('backend.reservation.index', compact('reservation'));
    }

    public function show($id)
    {
        $reservation = Reservation::where('id',$id)->first();
        return view('backend.reservation.show',compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        Reservation::find($id)->update([
            'status' => true
        ]);

        notify()->success("Reservation Confirm Successfully !!","Success");
        return redirect()->back();
    }


    public function destroy($id) 
    {
        Reservation::where('id',$id)->delete();
        notify()->success("Reservation Deleted Successfully !!","Success");
        return redirect()->back();
    }
}
