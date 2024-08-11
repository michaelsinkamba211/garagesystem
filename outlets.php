<?php
include('scripts.php');
include('includes/header.php'); 
include('Staff_navbar.php');


$query = "SELECT * FROM outlet";
$result = mysqli_query($db, $query);
?>
<body>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add OutLet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="scripts.php" method="POST">

                    <div class="modal-body">

                        <div class="form-group">
                            <label>
                                Outlet Name
                            </label>
                            <input type="text" name="outlet_name" class="form-control" placeholder="...">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="outlet_btn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="card shadow mr-5">
            <div class="card-header py-0">
                <h2 class="display-6 text-center mt-2">OUTLETS</h2>
                <h6 class="m-0 font-weight-bold text-primary row">
                    <a class="link" href="index.php">
                        <button type="button" class="btn btn-danger pull-left mb-2">BACK</button>
                    </a>
                    <button
                        type="button"
                        class="btn btn-secondary ml-2 mb-2"
                        data-toggle="modal"
                        data-target="#addadminprofile">
                        Add Outlet
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
                        <tr class="text-weight-bold text-dark">
                            <th>Outlet Name
                            </th>
                            <th>Address</th>
                            <th>View Stock</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                <a class="link" href="orders.php">
                                    <button type="button" class="btn btn-secondary pull-left">Stock</button>
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="edit_id" value="">
                                    <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="scripts.php" method="post">
                                    <input
                                        type="hidden"
                                        name="delete_outlet"
                                        value="<?php echo $row['Outlet_ID']; ?>">
                                    <button type="submit" name="outlet_delete_btn" class="btn btn-danger">Delete</button>
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
        $('#outletsTable').DataTable(
            {"paging": false, "searching": true, "ordering": true, "info": true}
        );
    });
</script>
<?php
include('sorters.php');
?>