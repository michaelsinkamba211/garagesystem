<?php
session_start();
include('includes/header.php');
include('scripts.php'); 
?>
<!-- <div class="back"> -->
<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-3 col-md-6">

            <div class="card o-hidden border shadow-lg col-lg-9">
                <img src="img/Harmtedy.png" height="200" width="390">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-2">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                <?php
                
                  if(isset($_SESSION['Welcome']) && $_SESSION['Welcome'] !='') 
                  {
                   echo '<h4 class="text-success"> '.$_SESSION['Welcome'].' </h4>';
                 unset($_SESSION['Welcome']);
                  }

                    else
                     if (isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h4 class="text-danger"> '.$_SESSION['status'].' </h4>';
                        unset($_SESSION['status']);
                    }
                ?>
                                </div>

                                <form class="user" action="login.php" method="POST">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="email"
                                            class="form-control"
                                            placeholder="Enter email..."
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="Password"
                                            required="required">
                                    </div>

                                    <button type="submit" name="login_btn" class="btn btn-primary">
                                        Login
                                    </button>
                                    <hr>

                                    <!-- <input type="text" name="try" placeholder="Try Again" class="form-control"
                                    required> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>
<!-- </div> -->
<?php
session_destroy();
?>