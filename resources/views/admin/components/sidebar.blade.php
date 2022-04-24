  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#('admin.index')}}" class="brand-link">
      {{-- <img src="{{asset('front/images/favicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin-assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('page.all')}}" class="nav-link">
              <i class="nav-icon fas fa-pager"></i>
              <p>
                Pages
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('news.all')}}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
              <p>
                News
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('decision.all')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Decision
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('staff.all')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff
                {{-- <i class="fas fa-angle-left right"></i> --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
                <a href="{{route('vacancy.all')}}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt "></i>
                    <p>
                    Vacancies
                    </p>
                </a>
            </li>
          <li class="nav-item">
            <a href="{{route('gallary.all')}}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Gallary
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('usefull.all')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
