   <!-- Sidebar -->
   <ul class="accordion" id="accordionSidebar">

<!-- Sidebar - Brand-- 
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">

  </div>
  <div class="sidebar-brand-text mx-4"></sup>Garage Outlet Store System</div>
</a>

<!-- Divider --
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <span>Dashboard</span></a>
</li>

<!-- Divider --
<hr class="sidebar-divider">

<!-- Heading --
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu --
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <span>Local Staff</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Staff</h6>
      <a class="collapse-item" href="buttons.html">Add Staff</a>
      <a class="collapse-item" href="cards.html">View Staff</a>
    </div>
  </div>
</li>



<!-- #region --
<li class="nav-item">
  <a class="nav-link" href="register.php">
    <span>Admin Profile</span></a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <span>Reports</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Summary Reports:</h6>
      <a class="collapse-item" href="#">National Sales</a>
      <a class="collapse-item" href="#">Local sales</a>
      <a class="collapse-item" href="#">National Stock</a>
      <a class="collapse-item" href="#">Local Stock</a>
    </div>
  </div>
</li>

<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) --
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper --
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content --
      <div id="content">

        <!-- Topbar --
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) --
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin</h1>




          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow pull-right">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
               
                </span>
                <button type="button" class="btn btn-success pull" class="pull-right">Logout</button>
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <span>Reports</span>
                <a class="dropdown-item" href="#"> 
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thank You!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body btn btn-danger"> Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="login.php" method="POST"> 
           <a class="nav-link" href="login.php">
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
           </a>

          </form>


        </div>
      </div>
    </div>
  </div>