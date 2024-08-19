<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('includes/scripts.php');

$query = "SELECT * FROM payment";
$results = mysqli_query($db, $query);

?>

<div class="container-fluid">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-4">
            <h2 class="display-6 text-center">LOCAL SALES REPORT</h2>

            <ul class="mr-3">
                <a >
                    <button type="text" class="btn btn-primary mt-2 " onclick="print()">Print</button>
                </a>
            </ul>
            <h6 class="ml-2 font-weight-bold row">
                <a class="link" href="index.php">
                    <button type="button" class="btn btn-danger mt-2 ml-3">BACK</button>
                </a>
            </h6>

        </div>
        <div class="card-body">
            <?php

$query = "SELECT
(SELECT SUM(Price) FROM payment) AS total_sales,
(SELECT COUNT(Stock_Name) FROM payment) AS total_products";

$result = mysqli_query($db, $query);
    ?>

            <table
                class="mb-3 table-bordere text-center float-right"
                id="dataTable"
                width="30%"
                cellspacing="0">
                <tr class=" text-dark text-weight-bold">

                    <th>TOTAL PRODUCTS</th>
                    <th>TOTAL SALES</th>
                </tr>
                <tr>
                    <?php
            while ($row = mysqli_fetch_assoc($results))
            {
            ?>
                    <td class="text-weight-bold"><?Php echo $row['total_products'];?></td>
                    <td class="text-weight-bold">K
                        <?Php echo $row['total_sales'];?></td>
                </tr>
                <?php    
            }
            ?>

            </table>

            <table id="nationalsalesTable" class="table table-bordered text-center">
                <tr class="text-dark text-weight-bold">
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <?php
              while($row = mysqli_fetch_assoc($results))
              {
            ?>
                    <td><?php echo $row['CustomerName']?></td>
                    <td><?php echo $row['Stock_Name']?></td>
                    <td><?php echo $row['Price']?></td>
                    <td><?php echo $row['Date_Sold']?></td>
                </tr>
                <?php
              }
            ?>
            </tr>
        </table>
    </div>
</div>
</div>
</div>
<script>
$(document).ready(function () {
$('#nationalsalesTable').DataTable(
    {"paging": true, "searching": true, "ordering": true, "info": true}
);
});
</script>
<?php
include('sorters.php');
?>