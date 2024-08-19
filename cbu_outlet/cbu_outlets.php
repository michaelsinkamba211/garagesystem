<?php
include('../includes/scripts.php');
include('../includes/header.php'); 
include('../Staff_navbar.php');


$query = "SELECT * FROM outlet WHERE Outlet_Name = 'cbu'";
$result = mysqli_query($db, $query);
?>

<div class="container-fluid">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-4">
            <h6 class="m-0 font-weight-bold text-primary row">
                <a class="link" href="cbu_index.php">
                    <button type="button" class="btn btn-danger pull-left">BACK</button>
                </a>
            </h6>
        </div>

        <div class="card-body">

            <table
                class="table table-bordered text-center"
                id="dataTable"
                width="100%"
                cellspacing="0">
                <thead>
                    <tr class="text-weight-bold text-dark">
                        <th>Outlet Name
                        </th>
                        <th>Address</th>
                        <th>View Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
            while($row = mysqli_fetch_assoc($result))
            {
            ?>

                        <td><?php echo $row['Outlet_Name']; ?></td>
                        <td><?php echo $row['Address'];?></td>

                        <td>
                            <a class="link" href="cbu_orders.php">
                                <button type="button" class="btn btn-secondary pull-left">Stock</button>
                            </a>
                        </td>
                    </tr>

                    <?php
            }
            
            ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>
<?php 
include('../sorters.php');
 ?>