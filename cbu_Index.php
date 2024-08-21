<?php
include('header.php'); 
include('Staff_navbar.php'); 
include('scripts.php');
include('sorters.php');
?>

<ul
    class="logout d-flex justify-content-start list-unstyled btn btn-primary mr-3">
    <li>
        <a class="nav-link text-white" href="../welcome-page/admin.php">
            <span>Logout</span>
            <i class="fal fa-sign-out-alt ms-2"></i>
        </a>
    </li>
</ul>

<div class="profiles">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <a<i class="text-white-50"></i>
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            </form>
        </a>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-success shadow h-200 py-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-5">
                            <div class="nav-item">
                                <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <div class="nav-item">
                                        <a class="nav-link" href="cbu_sales.php">
                                            <span>SALES</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-success shadow h-200 py-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <div class="nav-item">
                                    <a class="nav-link" href="cbu_orders.php">
                                        <span>ORDERS</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
   
      ?>