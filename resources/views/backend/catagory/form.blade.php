@extends('layouts.backend.app')
@section('title',' Catagory')
@section('style')
<style>
    
    #addNew{margin-right: 20px}
       
</style>
@endsection
@section('page_name','Catagory')
@section('breadcumb','Catagory')

@section('main_content')
<div class="container">
    <div class="card">
        <div class="card-body">
                <form action="{{ isset($catagory) ? route('catagory.update',$catagory->id) : route('catagory.store') }}" method="POST">
                    @csrf
                    @isset($catagory)
                        @method('PUT')
                    @endisset
                <div class="form-group">
                    <label for="name">Catagory Name</label>
                    <input type="test" name="cat_name" class="form-control @error('cat_name') is-invalid @enderror" value="{{ $catagory->cat_name ?? old('cat_name') }}"> 
                        @error('cat_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="">
                    <button class="btn btn-primary" id="addbtn">@isset($catagory) Update
                        @else Create
                    @endisset</button>
                    <a class="btn btn-secondary submit-btn" href="{{ route('catagory.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection



