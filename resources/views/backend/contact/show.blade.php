@extends('layouts.backend.app')
@section('title',' Contact')
@section('page_name','Contact')
@section('breadcumb','Contact')

@section('main_content')

<div class="card card-primary">
    <div class="card-header">
        <h5 class="card-title">Show Message</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{$contact->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$contact->email}}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{$contact->subject}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$contact->message}}</td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="{{ url('admin/contact') }}" class="btn btn-secondary">Back</a></td>
                </tr> 
            </tbody>
        </table>
    </div>
</div>




@endsection







