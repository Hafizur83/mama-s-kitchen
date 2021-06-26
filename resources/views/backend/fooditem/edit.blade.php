@extends('layouts.backend.app')
@section('title',' Update Item')
@section('style')
<link rel="stylesheet" href="{{asset('public/admin/js/summernote/summernote-bs4.min.css')}}">
@endsection
@section('page_name','Update Item')
@section('breadcumb','Update Item')


@section('main_content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Item</h3>
        </div>
        <div class="card-body">
            <form action="{{route('fooditems.update',$FoodItems->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="test" name="name" class="form-control @error('title') is-invalid @enderror" id="name" value="{{$FoodItems->name}}">
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="catagory">Catagory</label>
                    <input type="hidden" name="old_cat" value="{{$FoodItems->cat_id}}">
                        <select name="cat_id" id="catagory" class="form-control">
                            <option selected disabled>Select Catagory</option>
                        @foreach($catagories as $catagory)
                        <option value="{{$catagory->id}}" {{$catagory->id == $FoodItems->cat_id ? 'selected' : ''}}>{{$catagory->cat_name}}</option>
                        @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="body" cols="30" id="summernote" rows="10" class="form-control">{{$FoodItems->body}}</textarea>
                    @error('body') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="test" name="price" class="form-control @error('title') is-invalid @enderror" id="price" value="{{$FoodItems->price}}">
                    @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="hidden" name="old_img" value="{{$FoodItems->image}}">
                    <img class="float-right" id="previewimg" width="200px" src="{{asset('public/images/fooditems/'.$FoodItems->image)}}" alt=""><br>
                    <label class="btn btn-sm btn-primary ml-4"> Add File
                        <input onchange="previewfile(this)" type="file" name="image" id="image" class="d-none">
                    </label>
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="editbtn">Update</button>
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