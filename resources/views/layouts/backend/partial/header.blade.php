  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('admin/dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('admin/contact') }}" class="nav-link">Contact</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a href="#" class="nav-link" data-toggle="dropdown">
           <span class="mr-2">{{ Auth::user()->name }}</span>
           @if (Auth::user()->profile == null)
            <img src="{{ asset('public/images/user.jpg')}}" alt="profile" class="img-profile rounded-circle">
               @else
               <img src="{{ asset('public/images/'.Auth::user()->profile )}}" alt="profile" class="img-profile rounded-circle">
           @endif
            
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow">
            <a href="{{url('admin/profile')}}" class="dropdown-item">
                <i class="fas fa-user fa-sm mr-2 text-gray-400"></i>Profile
            </a>
            <a href="{{url('admin/profile/reset')}}" class="dropdown-item">
              <i class="fas fa-user fa-sm mr-2 text-gray-400"></i>Change Password
          </a>
            
            <a href="{{url('/')}}" target="_blank" class="dropdown-item">
                <i class="fas fa-cogs fa-sm mr-2 text-gray-400"></i>Site
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"
                           onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>Logout

            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->