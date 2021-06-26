<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @php
            $setting = App\Models\Setting::first();
        @endphp
        <link rel="shortcut icon" href="{{ asset('public/images/'.$setting->favicon) }}" type="image/x-icon">

        <title>Mamma's Kitchen</title>

        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/pricing.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap-datepicker3.min.css')}}">
        <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
<style>

.about-bg{
	background-image: url('{{ asset('public/frontend/images/About-C-bg.jpg') }}');
	background-repeat: no-repeat;
	background-size: 85%;
  	background-position-x: 15%;
  	background-position-y: 80%;
}
.reserve .section-bg{
    background-image: url('{{ asset('public/frontend/images/RaT-bg.jpg') }}');
}
.fb{background: url('{{ asset('public/frontend/images/social/facebook_color.png') }}');}
.fb:hover{background: url('{{ asset('public/frontend/images/social/facebook_black.png') }}');}
.twit {background: url('{{ asset('public/frontend/images/social/twitter_color.png') }}');}
.twit:hover {background: url('{{ asset('public/frontend/images/social/twitter_black.png') }}');}
.g-plus {background: url('{{ asset('public/frontend/images/social/g-plus_color.png') }}');}
.g-plus:hover {background: url('{{ asset('public/frontend/images/social/g-plus_black.png') }}');}
.link {background: url('{{ asset('public/frontend/images/social/linkedin_color.png') }}');}
.link:hover {background: url('{{ asset('public/frontend/images/social/linkedin_black.png') }}');}

</style>
        <script src="{{asset('public/frontend/js/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.flexslider.min.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>

        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(24.909439, 91.833800),
                    zoom: 16,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(24.909439, 91.833800),
                    title:"Mamma's Kitchen Restaurant"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


    </head>
    <body data-spy="scroll" data-target="#template-navbar">

        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        @if ($setting->logo == null)
                            <img style="width: 120px;height:50px" src="{{ asset('public/images/logo.png') }}" class="logo img-responsive">
                            @else
                            <img style="width: 120px;height:50px" src="{{ asset('public/images/'.$setting->logo) }}" class="logo img-responsive">
                        @endif
                       
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#header-slider">Home</a></li>
                        <li><a href="#about">about</a></li>
                        <li><a href="#pricing">pricing</a></li>
                        <li><a href="#reserve">reservation</a></li>
                        <li><a href="#contact">contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>


        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            @forelse ($sliders as $slider)
                
           
            <div class="item" style="background: url({{ asset('public/images/slider/'.$slider->image) }});background-size: cover;background-repeat: no-repeat;">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">{{ $slider->title }}</h1>
                        <p class="header-sub-title">{{ $slider->sub_title }}</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>

            @empty
                Vo Data Available
            @endforelse

        </section>



        <!--== 6. About us ==-->
        <section id="about" class="about">
            <img src="{{ asset('public/frontend/images/icons/about_color.png') }}" class="img-responsive section-icon hidden-sm hidden-xs">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                            <div class="section-content">
                                <h2 class="section-content-title">About us</h2>
                                <p class="section-content-para">
                                    Astronomy compels the soul to look upward, and leads us from this world to another.  Curious that we spend more time congratulating people who have succeeded than encouraging people who have not. As we got further and further away, it [the Earth] diminished in size.
                                </p>
                                <p class="section-content-para">
                                    beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.  Where ignorance lurks, so too do the frontiers of discovery and imagination.
                                </p>
                            </div> <!-- /.section-content -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->


        <!--==  7. Afordable Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Affordable Pricing</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">All</li>

                                            @forelse ($catagories as $catagory)
                                            <li class="filter" data-filter=".filter{{ $catagory->id }}">{{ $catagory->cat_name }}</li>

                                            @empty
                                                No Data Available
                                            @endforelse
                                        </ul><!-- end #filter-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">

                                @forelse ($catagories as $item)
                                   <?php 
                                        $fooditems = App\Models\FoodItem::where('cat_id', $item->id)->get();
                                   ?>         
                             @foreach ($fooditems as $fooditem)
    
                                <li class="item filter{{ $item->id }}">
                                    <a href="#">
                                        <img src="{{ asset('public/images/fooditems/'.$fooditem->image ) }}" class="img-responsive" alt="Food" >
                                        <div class="menu-desc text-center">
                                            <span>
                                                <h3>{{ $fooditem->name }}</h3>
                                                {{ $fooditem->body }}
                                            </span>
                                        </div>
                                    </a>
                                    <h2 class="white">{{ $fooditem->price }}</h2>
                                </li>
                               
                                @endforeach
    

                            @empty
                                    
                                @endforelse
                            </ul>


                        </div>   
                    </div>
                </div>

            </div> 
        </section>



        <!--== 15. Reserve A Table! ==-->
        <section id="reserve" class="reserve">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/reserve_black.png">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Reserve A Table !</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">
                            
                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#reserve -->



        <section class="reservation">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="{{ asset('public/frontend/images/icons/reserve_color.png') }}">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class=" section-content">
                        <div class="row">
                            <div class="col-md-5 col-sm-6">
                                <form class="reservation-form" method="post" action="{{ route('reservation') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control reserve-form empty iconified" name="name" required="required" placeholder="  &#xf007;  Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control reserve-form empty iconified" required="required" placeholder="  &#xf1d8;  e-mail">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="tel" class="form-control reserve-form empty iconified" name="phone" required="required" placeholder="  &#xf095;  Phone">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control reserve-form empty iconified" name="date_and_time" id="datepicker" required="required" placeholder="&#xf017;  Time">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3" required="required" placeholder="  &#xf086;  We're listening"></textarea>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                                                <span><i class="fa fa-check-circle-o"></i></span>
                                                Make a reservation
                                            </button>
                                        </div>
                                            
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-2 hidden-sm hidden-xs"></div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="opening-time">
                                    <h3 class="opening-time-title">Hours</h3>
                                    <p>Mon to Fri: 7:30 AM - 11:30 AM</p>
                                    <p>Sat & Sun: 8:00 AM - 9:00 AM</p>

                                    <div class="launch">
                                        <h4>Lunch</h4>
                                        <p>Mon to Fri: 12:00 PM - 5:00 PM</p>
                                    </div>

                                    <div class="dinner">
                                        <h4>Dinner</h4>
                                        <p>Mon to Sat: 6:00 PM - 1:00 AM</p>
                                        <p>Sun: 5:30 PM - 12:00 AM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>




        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Contact With us</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p>16th Birn street Get Plaza (4th floar) USA</p>
                            <p>+44 12 213584</p>
                            <p>example@mail.com </p>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="center-block">
                                <li><a href="#" class="fb"></a></li>
                                <li><a href="#" class="twit"></a></li>
                                <li><a href="#" class="g-plus"></a></li>
                                <li><a href="#" class="link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div id="map-canvas"></div>
            </div>
        </div>



        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                             <form class="contact-form" method="post" action="{{ route('submit') }}">
                                @csrf
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" required="required" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control"  required="required" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" required="required" placeholder="Subject">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control"  rows="7" required="required" placeholder="Message"></textarea>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-send">Send </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2015 <a href="http://themewagon.com/"  target="_blank">ThemeWagon</a> and Developed by<a href="http://hafizur83.xyz/">Hafizur</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.mixitup.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.hoverdir.js')}}"></script>
        <script src="{{asset('public/frontend/js/jQuery.scrollSpeed.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('public/js/iziToast.js') }}"></script>
        @include('vendor.lara-izitoast.toast')
        <script src="{{asset('public/frontend/js/script.js')}}"></script>
       

    </body>
</html>

{{-- line 937 --}}