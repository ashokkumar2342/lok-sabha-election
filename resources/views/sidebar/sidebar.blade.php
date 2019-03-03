<!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
        

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Dashboard
                     
                  </p>
                </a>
              
              <li class="nav-item">
                <a href="{{ route('candidate.details') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Candidate Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('pc.details') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    PC Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('ac.details') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    AC Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('booth.details') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Booth Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>