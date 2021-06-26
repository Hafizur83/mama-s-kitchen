@extends('layouts.backend.app')
@section('title',' Change Password')
@section('page_name','Change Password')
@section('breadcumb','Change Password')

@section('main_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Password Change</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('change.password') }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group row">
                <label for="old_pwd" class="col-sm-3 col-form-label">Old Password</label>
                <div class="col-sm-9">
                    <input type="password" name="old_password" class="form-control" id="old_pwd">
                </div>
                </div>
                <div class="form-group row">
                <label for="new_pwd" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="new_pwd">
                </div>
                </div>
                <div class="form-group row">
                <label for="confirm_pwd" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" name="confirm_password" class="form-control" id="confirm_pwd">
                </div>
                </div>
                <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection