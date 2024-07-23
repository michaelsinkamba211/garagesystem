  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php

  // initializing variables
$username = "";
$email    = "";
$errors = array(); 

$connection = mysqli_connect("localhost","root","","project");

    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
      
        if (empty($email)) {
            array_push($errors, "email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $results = mysqli_query($connection, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['email'] = $username;
              $_SESSION['success'] = "You are now logged in";
              header('index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
      }

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('register.php');
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('register.php');
    }
}

  
?>