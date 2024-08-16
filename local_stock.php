<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$query = "SELECT * FROM orders";
$results = mysqli_query($db, $query);

?>

<div class="container-fluid">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-4">
            <h2 class="display-6 text-center">LOCAL STOCK REPORT</h2>
            <h6 class="ml-2 font-weight-bold row">
                <a class="link" href="index.php">
                    <button type="button" class="btn btn-danger mt-2 ml-3">BACK</button>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <?php 

$query = "SELECT 
    (SELECT SUM(Price) FROM orders) AS total_sales,
    (SELECT SUM(Discount) FROM orders) AS total_discounts,
    (SELECT COUNT(Stock_Name) FROM orders) AS total_products";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($results);

?>

            <table
                class="mb-3 table-border text-center float-right"
                id="dataTable"
                width="30%"
                cellspacing="0">
                <tr class=" text-dark text-weight-bold">
                    <th>TOTAL DISCOUNT</th>
                    <th>TOTAL PRODUCTS</th>
                    <th>TOTAL PRICE</th>
                </tr>
                <tr>
                    <td class="text-dark text-weight-bold">K
                        <?Php echo $row['total_discounts'];?></td>
                    <td class="text-weight-bold"><?Php echo $row['total_products'];?></td>
                    <td class="text-dark text-weight-bold">K
                        <?Php echo $row['total_sales'];?></td>
                </tr>
            </table>

            <table class="table table-bordered text-center">
                <tr class="text-dark text-weight-bold">
                    <th>Product</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Outlet</th>
                </tr>
                <?php
            while($row = mysqli_fetch_assoc($results))
            {
          ?>
                <tr>
                    <td><?php echo $row['Stock_Name']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><?php echo $row['Discount']?></td>
                    <td><?php echo $row['Outlet_Name']?></td>
                </tr>
                <?php
            }
          ?>
            </table>
        </div>
    </div>
</div>
</div>