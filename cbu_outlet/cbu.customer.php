<?php
session_start();
include('../includes/header.php'); 
include('../Staff_navbar.php');
include('../includes/scripts.php');

$query = "SELECT * FROM customer WHERE Outlet_Name = 'cbu'";
$result = mysqli_query($db, $query);
?>

<div
    class="modal fade"
    id="addadminprofile"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="scripts.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input
                            type="text"
                            name="Address"
                            class="form-control"
                            placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input
                            type="text"
                            name="Phone_Number"
                            class="form-control"
                            placeholder="Enter Number">
                    </div>
                        <input
                            type="hidden"
                            name="branch"
                            value="CBU">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="customer_btn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="container-fluid mt-5">

    <div class="card shadow mr-5">
        <div class="card-header py-0">
            <h2 class="display-6 text-center">CUSTOMERS</h2>
            <h6 class="ml-2 m-10 font-weight-bold text-primary row">
                <a class="link" href="cbu_sales.php">
                    <button type="button" class="btn btn-danger mt-2 mr-2">BACK</button>
                </a>
                <div>
                    <button
                        type="button"
                        class="btn btn-secondary mt-2"
                        data-toggle="modal"
                        data-target="#addadminprofile">
                        New Customer
                    </button>
                </h6>
            </div>
            <div class="card-body">
                <table id="customerTable" class="table table-bordered text-center text-dark">
                    <tr class="text-dark text-weight-bold">
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Outlet</th>
                    </tr>
                    <tr>
                        <?php
             while($row = mysqli_fetch_assoc($result))
            {
            ?>
                        <td><?php echo $row['CustomerName']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Phone_Number']; ?></td>
                        <td><?php echo $row['Outlet_Name']; ?></td>
                    </tr>
                    <?php
            }
            ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#customerTable').DataTable(
                {"paging": true, "searching": true, "ordering": true, "info": true}
            );
        });
    </script>
    <?php
include('../sorters.php');
session_destroy();
?>