<?php
    include 'header.php';
    if (isset($c_id) == false) {
        echo "<script>window.location.href = 'login.php';</script>";
    }else{
?>
    <!-- Include head in this part -->
    <div style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-10 offset-1 items_in_cart">
                   <!-- THe fiel from inc/cart_items.php will show in here -->
                </div>
            </div>
        </div>
    </div>
<?php
    }
    include 'footer.php';
?>
<!-- Footer Start Here -->