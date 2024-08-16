<?php
include('footer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link rel="stylesheet" href="sb-admin-2.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>
  <?php
    session_start();
    include 'scripts.php';
    include('includes/header.php');
    include('Staff_navbar.php');
    // Check if 'Id' is present in the URL
    if(isset($_GET['Id'])) {
        $_SESSION["id"] = $_GET['Id'];
        $id = $_SESSION["id"];
        
        // Prepare and execute the statement securely
        $statement = $db->prepare("SELECT * FROM employee WHERE Employee_id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $table = $statement->fetch();
    } else {
        echo "No employee ID provided.";
        exit;
    }
  ?>

  <div class="container w-50">
    <form method="POST" action="scripts.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="img" class="col-form-label">Image:</label>
        <input type="file" class="form-control" id="img" accept=".jpg,.png,.jpeg" name="img">
      </div>
      <div class="form-group">
        <label for="Name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo htmlspecialchars($table['Employee_Name']); ?>">
      </div>
      <div class="form-group">
        <label for="Email" class="col-form-label">Email:</label>
        <input type="email" class="form-control" id="Email" name="Email" value="<?php echo htmlspecialchars($table['Email']); ?>">
      </div>
      <div class="form-group">
        <label for="Phone" class="col-form-label">Phone:</label>
        <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo htmlspecialchars($table['Password']); ?>">
      </div>
      <div class="form-group">
        <label for="EnrollNumber" class="col-form-label">Enroll Number:</label>
        <input type="text" class="form-control" id="EnrollNumber" name="EnrollNumber" value="<?php echo htmlspecialchars($table['Outlet_Name']); ?>">
      </div>
      <div class="form-group">
        <label for="DateOfAdmission" class="col-form-label">Date of Admission:</label>
        <input type="text" class="form-control" id="DateOfAdmission" name="DateOfAdmission" value="<?php echo htmlspecialchars($table['Position']); ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Update Employee</button>
      </div>
    </form>
  </div>
  
  <script src="../js/script.js"></script>
  <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
