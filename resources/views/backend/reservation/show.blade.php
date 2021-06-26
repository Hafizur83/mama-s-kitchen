@extends('layouts.backend.app')
@section('title',' Reservation')
@section('page_name','Reservation')
@section('breadcumb','Reservation')
@section('style')
<style>
    .table tbody tr th{
        width: 30%;
    }
</style>
    
@endsection
@section('main_content')

<div class="card card-primary">
    <div class="card-header">
        <h5 class="card-title">Show Reservation</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$reservation->name}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$reservation->phone}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$reservation->email}}</td>
                </tr>
                <tr>
                    <th>Date of Reservation</th>
                    <td>{{$reservation->date_and_time}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$reservation->message}}</td>
                </tr>
                <tr>
                    <th>
                    </th>
                    <td> @if ($reservation->status ==false)
                            <form  class="d-inline" action="{{ route('reservation.update', $reservation->id ) }}" method="POST"> @csrf  @method('PUT')
                            <button class="btn btn-primary">Confirmed</button></form>
                        @endif
                    <a href="{{ url('admin/reservation') }}" class="btn btn-secondary">Back</a></td>
                </tr> 
            </tbody>
        </table>
    </div>
</div>




@endsection







