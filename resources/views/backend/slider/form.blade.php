@extends('layouts.backend.app')
@section('title',' Catagory')
@section('page_name','Catagory')
@section('breadcumb','Catagory')

@section('main_content')
<div class="container">
    <div class="card">
        <div class="card-body">
                <form action="{{ isset($slider) ? route('slider.update',$slider->id) : route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($slider)
                        @method('PUT')
                    @endisset
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="test" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $slider->title ?? old('title') }}"> 
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="name"> Sub Title</label>
                    <input type="test" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" value="{{ $slider->sub_title ?? old('sub_title') }}"> 
                        @error('sub_title')
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
                    @isset($slider)
                        <input type="hidden" name="old_img" value="{{$slider->image}}">
                        <img class="float-right" id="previewimg" width="200px" src="{{asset('public/images/slider/'.$slider->image)}}" alt=""><br>
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
                    <button class="btn btn-primary" id="addbtn">@isset($slider) Update
                        @else Create
                    @endisset</button>
                    <a class="btn btn-secondary submit-btn" href="{{ route('slider.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('script')

<script>


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



