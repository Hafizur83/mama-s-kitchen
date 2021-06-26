@extends('layouts.backend.app')
@section('title',' Setting')
@section('page_name','Setting')
@section('breadcumb','Setting')
@section('style')
<style>
</style>

@endsection
@section('main_content')
<div class="container">
  <div class="card card-primary card-outline">
    <div class="card-body">
        <div class="row">
            <div class="col-7 col-sm-9">
                <form action="{{ route('setting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2">Logo</label>
                        <div class="col-md-5">
                            <label class="btn btn-sm btn-warning">Replace
                                <input onchange="viewlogo(this)" type="file" name="logo" id="inputlogo" class="form-control d-none">
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                            <img width="80px" id="logo" src="{{ asset('public/images/'.$setting->logo) }}" alt="logo">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2">Favicon</label>
                        <div class="col-md-5">
                            <label class="btn btn-sm btn-warning">Replace
                                <input onchange="viewfavicon(this)" type="file" id="inputfavicon" name="favicon" class="form-control d-none">
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="old_favicon" value="{{ $setting->favicon }}">
                            <img width="80px" id="favicon" src="{{ asset('public/images/'.$setting->favicon) }}" alt="favicon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
</div>

@endsection
@section('script')
<script>
    //-------------Preview Logo Script 
    function viewlogo(input) {
        var file = $("#inputlogo").get(0).files[0]
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#logo").attr('src', reader.result);
            }
            reader.readAsDataURL(file)
        }
    }

    //-------------Preview Favicon Script 
    function viewfavicon(input) {
        var file = $("#inputfavicon").get(0).files[0]
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $("#favicon").attr('src', reader.result);
            }
            reader.readAsDataURL(file)
        }
    }
</script>
@endsection