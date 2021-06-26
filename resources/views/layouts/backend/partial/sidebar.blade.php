
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{ url('admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
      {{-- ---Nav Item--- --}}
    <li class="nav-item">
      <a href="{{ url('admin/reservation') }}" class="nav-link  {{ Request::is('admin/reservation') ? 'active' : '' }}">
        <i class="nav-icon fas fa-ticket-alt"></i>
        <p>Reservation</p>
      </a>
    </li>
  {{-- ---Nav Item--- --}}
      <li class="nav-item {{ Request::is('admin/catagory') || Request::is('admin/catagory/create')? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ Request::is('admin/catagory') || Request::is('admin/catagory/create')? 'active' : '' }}">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Catagory
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('admin/catagory/create') }}" class="nav-link {{ Request::is('admin/catagory/create') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Create Catagory</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/catagory') }}" class="nav-link  {{ Request::is('admin/catagory') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Catagory List</p>
          </a>
        </li>
      </ul>
    </li>
     {{-- ---Nav Item--- --}}
    <li class="nav-item {{ Request::is('admin/fooditems') || Request::is('admin/fooditems/create')? 'menu-is-opening menu-open' : '' }}">
      <a href="#" class="nav-link {{ Request::is('admin/fooditems') || Request::is('admin/fooditems/create')? 'active' : '' }}">
        <i class="nav-icon fas fa-apple-alt"></i>
        <p>
          Food Items
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('admin/fooditems/create') }}" class="nav-link {{ Request::is('admin/fooditems/create') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Create Food Item</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/fooditems') }}" class="nav-link  {{ Request::is('admin/fooditems') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Food Item List</p>
        </a>
      </li>
    </ul>
  </li>
     {{-- ---Nav Item--- --}}

    <li class="nav-item {{ Request::is('admin/slider') || Request::is('admin/slider/create')? 'menu-is-opening menu-open' : '' }}">
      <a href="#" class="nav-link {{ Request::is('admin/slider') || Request::is('admin/slider/create')? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>  Slider <i class="right fas fa-angle-left"></i> </p>
      </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ url('admin/slider/create') }}" class="nav-link {{ Request::is('admin/slider/create') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Create Slider</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/slider') }}" class="nav-link  {{ Request::is('admin/slider') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Slider List</p>
        </a>
      </li>
    </ul>
  </li>
    <li class="nav-header">System</li>
     {{-- ---Nav Item--- --}}
    <li class="nav-item  {{ Request::is('admin/setting') || Request::is('admin/setting/mail')? 'menu-is-opening menu-open' : '' }}">
      <a href="#" class="nav-link {{ Request::is('admin/setting') || Request::is('admin/setting/mail') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          Setting
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
          <a href="{{ url('admin/setting') }}" class="nav-link  {{ Request::is('admin/setting') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Generel</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/setting/mail') }}" class="nav-link  {{ Request::is('admin/setting/mail') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Mail Setting</p>
          </a>
        </li>
      </ul>
    </li>

    {{-- <li class="nav-item menu-is-opening menu-open">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Charts
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
          <a href="pages/charts/chartjs.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>ChartJS</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/charts/flot.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Flot</p>
          </a>
        </li>
      </ul>
    </li> --}}
  </ul>
</nav>
<!-- /.sidebar-menu -->

