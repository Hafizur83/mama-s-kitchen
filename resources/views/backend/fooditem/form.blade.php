@extends('layouts.backend.app')
@section('title',' Add Item')
@section('style')
<link rel="stylesheet" href="{{asset('public/admin/js/summernote/summernote-bs4.min.css')}}">
@endsection
@section('page_name','Add Item')
@section('breadcumb','Add Item')


@section('main_content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> @isset($fooditem) Update
                @else Create
            @endisset Item</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($fooditem) ? route('fooditems.update',$fooditem->id) : route('fooditems.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @isset($fooditem)
                    @method('PUT')
                    <input type="hidden" name="old_cat" value="{{$fooditem->cat_id}}">
                @endisset
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="test" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $fooditem->name ?? old('name') }}"> 
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="catagory">Catagory</label>
                        <select name="cat_id" id="catagory" class="form-control @error('cat_id') is-invalid @enderror">
                            <option selected disabled>Select Catagory</option>
                        @foreach($catagories as $catagory)
                        @isset($fooditem)
                            <option value="{{$catagory->id}}" {{$catagory->id == $fooditem->cat_id ? 'selected' : ''}}>{{$catagory->cat_name}}</option>
                            @else
                            <option value="{{$catagory->id}}">{{$catagory->cat_name}}</option>
                        @endisset
                            
                           
                        @endforeach
                        </select>
                        @error('cat_id')
                            <span style="font-size: 80%" class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="body" cols="30" id="summernote" rows="10" class="form-control  @error('body') is-invalid @enderror">{{ $fooditem->body ?? old('body') }}</textarea>
                    @error('body')
                        <span style="font-size: 80%" class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="test" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $fooditem->price ?? old('price') }}"> 
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <label class="btn btn-sm btn-primary ml-4"> Add File
                        <input onchange="previewfile(this)" type="file" name="image" id="image" class="d-none">
                    </label>
                    @isset($fooditem)
                        <input type="hidden" name="old_img" value="{{$fooditem->image}}">
                        <img class="float-right" id="previewimg" width="200px" src="{{asset('public/images/fooditems/'.$fooditem->image)}}" alt=""><br>
                        @else
                        <img class="float-right" id="previewimg" width="200px" src=""><br>
                    @endisset
                   
                    @error('image')
                        <span style="font-size: 80%" class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="">
                    <button class="btn btn-primary" id="addbtn"> @isset($fooditem) Update
                        @else Create
                    @endisset</button>
                    <a href="{{url('admin/fooditems')}}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>

    </div>




</div>





@endsection

@section('script')
<script src="{{asset('public/admin/js/summernote/summernote-bs4.min.js')}}"></script>

<script>

$('#summernote').summernote()

//-------------Preview Logo Script 
function previewfile(input){
     var file = $("#image").get(0).files[0]
     if(file){
         var reader = new FileReader();
         reader.onload = function (){
             $("#previewimg").attr('src',reader.result);
         }
         reader.readAsDataURL(file)
     }
 }
</script>
@endsection

