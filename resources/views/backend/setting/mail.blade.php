@extends('layouts.backend.app')
@section('title',' Mail Setting')
@section('page_name','Mail Setting')
@section('breadcumb','Mail Setting')
@section('main_content')
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-body">
          <div class="row">
            <div class="col-7 col-sm-9">
                  <form action="{{ route('mail.update') }}" method="post" class="row">
                    @csrf
                    @method('PUT')
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>MAIL_MAILER</label>
                          <input type="text" name="mailer" class="form-control" value="{{ setting('mailer') ?? old('mailer') }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>MAIL_HOST</label>
                          <input type="text" name="mail_host" class="form-control" value="{{ setting('mail_host') ?? old('mail_host') }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>MAIL_PORT</label>
                          <input type="text" name="mail_port" class="form-control" value="{{ setting('mail_port') ?? old('mail_port') }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>MAIL_ENCRYPTION</label>
                          <input type="text" name="mail_encryption" class="form-control" value="{{ setting('mail_encryption') ?? old('mail_encryption') }}">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>MAIL_USERNAME</label>
                          <input type="text" name="mail_username" class="form-control" value="{{ setting('mail_username') ?? old('mail_username') }}">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>MAIL_PASSWORD</label>
                          <input type="password" name="mail_password" class="form-control" value="{{ setting('mail_password') ?? old('mail_password') }}">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>MAIL_FROM_ADDRESS</label>
                          <input type="text" name="mail_from_address" class="form-control" value="{{ setting('mail_from_address') ?? old('mail_from_address') }}"> 
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>MAIL_FROM_NAME</label>
                          <input type="text" name="mail_from_name" class="form-control" value="{{ setting('mail_from_name') ?? old('mail_from_name') }}">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
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
 function viewlogo(input){
     var file = $("#inputlogo").get(0).files[0]
     if(file){
         var reader = new FileReader();
         reader.onload = function (){
             $("#logo").attr('src',reader.result);
         }
         reader.readAsDataURL(file)
     }
 }

         //-------------Preview Favicon Script 
         function viewfavicon(input){
     var file = $("#inputfavicon").get(0).files[0]
     if(file){
         var reader = new FileReader();
         reader.onload = function (){
             $("#favicon").attr('src',reader.result);
         }
         reader.readAsDataURL(file)
     }
 }
</script>
@endsection