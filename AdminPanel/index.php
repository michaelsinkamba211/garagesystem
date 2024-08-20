<?php
session_start();
include('../includes/header.php');
include('../Staff_navbar.php'); 
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

<div class="container-fluid">
    <div class="align-items-center ">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        <a>
            <i class="text-white"></i>
            <div class="input-group"></div>
        </a>
        <div class="row mr-5 mt-5">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-200 py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="nav-item">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <div class="nav-item">
                                            <a class="nav-link" href="sales.php">
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
                <div class="card border-hamtedy shadow py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <div class="nav-item">
                                        <a class="nav-link" href="outlets.php">
                                            <span>OUTLET ORDERS</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-info shadow h-200 py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <div class="nav-item">
                                                <a class="nav-link" href="warehouse.php">
                                                    <span>WAREHOUSE</span></a>
                                            </div>
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
                            <div class="col mr-7">
                                <div class="nav-item">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <div class="nav-item">
                                            <a class="nav-link" href="register.php">
                                                <span>ADMIN PROFILE</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-200 py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-7">
                                <div class="nav-item">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <div class="nav-item">
                                            <a class="nav-link" href="staff.php">
                                                <span>LOCAL STAFF</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-200 py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-7">
                                <div class="nav-item">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <div class="nav-item">
                                            <a class="nav-link" href="loan.php">
                                                <span>LOANS</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-primary shadow h-200 py-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-7">
                                <div class="nav-item">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <div class="nav-item">
                                            <a
                                                class="nav-link collapsed"
                                                href="#"
                                                data-toggle="collapse"
                                                data-target="#collapseUtilities"
                                                aria-expanded="true"
                                                aria-controls="collapseUtilities">
                                                <span>REPORTS</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        id="collapseUtilities"
                                        class="collapse"
                                        aria-labelledby="headingUtilities"
                                        data-parent="#accordionSidebar">
                                        <div class="bg-white py-2 collapse-inner rounded">
                                            <h6 class="collapse-header">Summary Reports:</h6>
                                            <a class="collapse-item" href="#">National Sales</a><br>
                                            <a class="collapse-item" href="../Reports/national_sales.php">Local sales</a><br>
                                            <a class="collapse-item" href="../Reports/national_stock.php">National Stock</a><br>
                                            <a class="collapse-item" href="../Reports/local_stock.php">Local Stock</a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <?php
include('sorters.php');
session_destroy();
?>