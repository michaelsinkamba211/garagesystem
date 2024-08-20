<?php
include('../includes/header.php'); 
include('../Staff_navbar.php');
include('../includes/scripts.php');

$query = "SELECT * FROM stafforders WHERE status = 'pending'";
$result = mysqli_query($db, $query);
?>

<div class="container-fluid mt-5">
    <div class="card shadow mb-4 mr-5">
        <div class="card-header py-4">
            <h6 class="m-0 font-weight-bold text-primary row">
                <a class="link" href="warehousestock.php">
                    <button type="button" class="btn btn-danger mr-2" t="t">BACK</button>
                </a>
                <button
                    type="button"
                    class="btn btn-secondary pull-right"
                    data-toggle="modal"
                    data-target="#addadminprofile">
                    Add Admin
                </button>

            </h6>
        </div>

        <div class="card-body">

            <table
                id="dataTable"
                class="table table-bordered text-center text-dark"
                width="100%"
                cellspacing="0">
                <thead>
                    <tr class=" text-weight-bold">

                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Model</th>
                        <th>Description</th>
                        <th>Outlet</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
            while($row = mysqli_fetch_assoc($result))
            {
            ?>

                        <td><?php echo $row['Stock_Name']; ?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['quantity']?></td>
                        <td><?php echo $row['Model']?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['outlet_name']?></td>
                        <td><?php echo $row['created_at']?></td>
                        <td><?php echo $row['status']?></td>
                        <td>
                    <form action="scripts.php" method="POST">
                        <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="accept" class="btn btn-success">Accept</button>
                        <button type="submit" name="decline" class="btn btn-danger">Decline</button>
                    </form>
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
<script>
$(document).ready(function () {
    $('#registerTable').DataTable(
        {"paging": false, "searching": true, "ordering": true, "info": true}
    );
});
</script>
<?php
include('../includes/sorters.php')
?>