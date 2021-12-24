
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/klassy-logo.png" alt="logo" /></a>
      </div>
      <ul class="nav">

        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ url('/users'); }}">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Users</span>
          </a>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ url('/showFoodMenu') }}">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">FoodMenus</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ url('viewFoodChef') }}">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Chefs</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{ url('showReservation') }}">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Reservations</span>
          </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('showOrder') }}">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Orders</span>
            </a>
          </li>
      </ul>
    </nav>
    <!-- partial -->

    <!-- page-body-wrapper ends -->
