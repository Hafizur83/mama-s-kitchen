@extends('layouts.backend.app')
@section('title',' Profile')
@section('page_name','Profile')
@section('breadcumb','Profile')

@section('main_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title"> {{ ucfirst(Auth::user()->name) }} Profile</h6>
        </div>
        <div class="card-body box-profile">
            <form action="{{ route('profile.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="old_img" value="{{ Auth::user()->profile }}">
                <div class="text-center">
                    <img id="previewimg" class="profile-user-img img-fluid img-circle" src="{{ asset('public/images/'.Auth::user()->profile) }}" alt="User profile">
                  </div>
      
                  <h3 class="profile-username text-center">{{ ucfirst(Auth::user()->name) }}</h3>
      
                  <div class="form-group">
                      <label for="image">Image</label>
                      <label class="btn btn-sm btn-primary ml-4"> Add File
                          <input onchange="previewfile(this)" type="file" name="profile" id="image" class="d-none">
                      </label>
                  </div>
                  <button class="btn btn-primary" type="submit">Update Profile</button>
            </form>
          </div>
    </div>
</div>
@endsection

@section('script')

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