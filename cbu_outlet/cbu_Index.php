<?php
include('../includes/header.php'); 
include('../Staff_navbar.php'); 
include('../includes/scripts.php');
?>

<div class="profiles">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <a<i class="text-white-50"></i>
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
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
                                        <span>OUTLET ORDERS</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include('../sorters.php');
      ?>