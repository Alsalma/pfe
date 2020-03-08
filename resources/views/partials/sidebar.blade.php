  <!-- Main Sidebar Container -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Parc Automobile </span>
    </a>
 <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
            $segment = Request::segment(2);
          ?>
            <ul class="treeview-menu">

                <li><a href="ajaxdata"><span>Societe Transport</span></a></li>
            </ul>
          <li class="nav-item">
            <a href="" class="nav-link
              @if($segment=='categories')
              active
              @endif">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link
              @if($segment=='news')
              active
              @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                News
              </p>
            </a>
          </li>

          <li class="nav-header">Action</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="nav-icon fa fa-circle-o text-danger"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>



          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
