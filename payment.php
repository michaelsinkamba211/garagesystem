<?php
include('includes/header.php');
include('scripts.php');
include('Staff_navbar.php');

?>
<form action="scripts.php" method="POST">

       <div class="form-group">
          <label>Product Name</label>
            <input type="text" name="product_Name" class="form-control w-50">
        </div>
        <div class="form-group">
          <label>Price</label>
            <input type="text" name="price" class="form-control w-50">
        </div>
        <div class="form-group">
          <label>Quantity</label>
            <input type="text" name="quantity" class="form-control w-50">
        </div>
    <div class="modal-footer">
      <button type="submit" name="order_btn" class="btn btn-success btn mr-5">Done</button>
    </div>
</form>  
