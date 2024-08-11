<?php
include('includes/header.php'); 
include('Staff_navbar.php');
include('scripts.php');

$id =$_GET['id'];
$query = "SELECT * FROM loans WHERE loan_id = '$id'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['loans_btn']))
{
    $newName = $_POST['name'];
    $newContact = $_POST['Contact'];
    $newLoanAmount = $_POST['loan_amount'];
    $newLoanDate = $_POST['loan_date'];
    $newPaid = $_POST['paid'];
    $newReturnAmount = $_POST['return_amount'];
    $newReturnDate = $_POST['return_date'];
    $query = "UPDATE loans SET borrower_name = '$newName', Contact = '$newContact', loan_amount = '$newLoanAmount', loan_date = '$newLoanDate', Paid = '$newPaid', return_amount = '$newReturnAmount', due_date = '$newReturnDate' WHERE loan_id = '$id'";
    $query_run = mysqli_query($db, $query);
    header('location: loan.php');
}
?>
<div class="container-fluid d-flex justify-content-center">

    <div class="card shadow  w-100">
        <div class="card-header py-0">
            <h6 class="ml-2 font-weight-bold row">
                <a class="link l-20" href="loan.php">
                    <button type="button" class="btn btn-danger pull-left mt-2 mr-2">BACK</button>
                </a>
                <hr><br>
            </h6>
            <form method="POST" class=" justify-content-center">

                <div class="container w-50">
                    <form method="POST" action="update.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div>
                                <label for="first-name" class="form-label">Full Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    value="<?php echo $row['borrower_name'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div>
                                <label for="first-name" class="form-label">Contact</label>
                                <input
                                    type="text"
                                    name="Contact"
                                    value="<?php echo $row['Contact'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div>
                                <label for="last-name" class="form-label">Loan Amount</label>
                                <input
                                    type="text"
                                    name="loan_amount"
                                    value="<?php echo $row['loan_amount'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div>
                                <label for="phone" class="form-label">Loan Date</label>
                                <input
                                    type="date"
                                    name="loan_date"
                                    value="<?php echo $row['loan_date'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div>
                                <label for="position" class="form-label">Paid</label>
                                <input
                                    type="text"
                                    name="paid"
                                    value="<?php echo $row['Paid'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <label for="garage-number" class="form-label">Return Amount</label>
                                <input
                                    type="text"
                                    name="return_amount"
                                    value="<?php echo $row['return_amount'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div class="mb-3">
                                <label for="garage-number" class="form-label">Due Date</label>
                                <input
                                    type="date"
                                    name="return_date"
                                    value="<?php echo $row['due_date'];?>"
                                    class="form-control"
                                    required="required">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="loans_btn" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>