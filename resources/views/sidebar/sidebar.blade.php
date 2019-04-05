<!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
        

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview ">
                <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Dashboard
                     
                  </p>
                </a>
              @if (Auth::user()->role==1) 
             
              <li class="nav-item">
                <a href="{{ route('user.list') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    User Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
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
                  <i class="nav-icon fa fa-address-card"></i>
                  <p>
                    Booth Details
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('total.vote.form') }}" class="nav-link">
                  <i class="nav-icon fa fa-address-card"></i>
                  <p>
                    Total Vote Polled
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('conting.table') }}" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>
                    Conting Table
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('conting.table.booth.map') }}" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                    Conting Table Booth Map
                    <span class="right badge badge-danger"></span>
                  </p>
                </a>
              </li>
               @endif
               @if (Auth::user()->role==2)
                <li class="nav-item">
                  <a href="{{ route('aro.vote.form') }}" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                      Vote Details
                      <span class="right badge badge-danger"></span>
                    </p>
                  </a>
                </li>
               @endif

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>