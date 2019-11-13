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
                <div class="col-sm-12 col-md-6 col-lg-10 offset-1">
                    <div class="table-responsive">
                                <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">wishlist</h6>
                        <table class="table cart_table">
                            <thead>
                                <tr>
                                    <th style="width:400px;">product</th>
                                    <th>price</th>
                                    <th>stock status</th>
                                    <th>add to cart</th>
                                    <th>remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $prod = mysqli_query($conn,"SELECT * FROM customer_wishlist WHERE c_fk = '$c_id'");
                                    $tot = 0;
                                    while ($d = mysqli_fetch_assoc($prod)) {
                                        $p_k = $d['product_fk'];
                                        $i_id = $d['p_k'];

                                        $img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$p_k'"));

                                        $p_d = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE p_k = '$p_k'"));
                                        $brand_fk = $p_d['brand'];
                                        $sub = $p_d['price_p'] * $d['quantity'];
                                        $tot = $tot + $sub;
                                        $p_availability = $p_d['product_quantity'];

                                        $brand_n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM brand WHERE p_k = '$brand_fk'"));

                                ?>
                                <tr>
                                    <td>
                                        <div class="media box-shadow" style="height:70px;margin-bottom:10px;">
                                            <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="<?php echo 'admin/uploads/photo/'.$img['image_name'];?>" width="100%" class="mr-3"></div>
                                            <div class="media-body order_thumnail" style="padding:10px 0px;">
                                                <h5 style="font-size:16px;padding-bottom:5px;"><?php echo $p_d['name_p'];?></h5>
                                                <p style="margin-top:-10px;font-size:13px;color:#888;">Brand: <?php echo $brand_n['brand_name'];?></p>
                                                <p style="margin-top:-20px;font-size:13px;color:#888;">Model: <?php echo $p_d['model_p'];?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="font-weight:700;">P<?php echo number_format($p_d['price_p']);?>.00</td>
                                    <td>
                                        <?php
                                        if ($p_availability < 1) {
                                            echo "<p style='font-style: italic;font-size: 9px;color: red;font-weight: bold;'>Product out of stock</p>";
                                        }else{
                                            echo "IN STOCK";
                                        }
                                        ?>
                                            
                                    </td>
                                    <td style="text-align:center;"><i class="fa fa-cart-plus order remove_wish" id="<?php echo $p_k; ?>" style="font-size:20px;text-align:center;padding:0;"></i>
                                        <input type="hidden" id="cus_id" value="<?php echo $c_id; ?>">
                                        <input type="hidden" id="prod_quan" value="1"></td>
                                    <td><i class="fa fa-close remove_wish" style="font-size:20px;text-align:center;padding:0;" id="<?php echo $i_id; ?>"></i></td>
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
    </div>
<?php
    }
    include 'footer.php';
?>
<!-- Footer Start Here -->