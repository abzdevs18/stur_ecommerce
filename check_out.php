<?php
    include 'header.php';
?>
    <!-- Include head in this part -->
    <div style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-10 offset-1 box-shadow" style="padding:15px;">
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table cart_table order_">
                                        <thead style="text-align:left;">
                                            <tr style="text-align:left !important;">
                                                <th style="width:400px;text-align:left;">product</th>
                                                <th>price</th>
                                                <th>quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody style="border:none;">
                                            <?php
                                                // session_start();
                                                $c_id = $_SESSION['user_id'];
                                                include 'inc/conn.php';

                                                $prod = mysqli_query($conn,"SELECT * FROM customer_cart WHERE c_fk = '$c_id'");
                                                $tot = 0;
                                                $quantity_in_cart = 0;
                                                while ($d = mysqli_fetch_assoc($prod)) {
                                                    $p_k = $d['product_fk'];
                                                    $i_id = $d['p_k'];
                                                    $quantity_in_cart += $d['quantity'];

                                                    $img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$p_k'"));

                                                    $p_d = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE p_k = '$p_k'"));
                                                    $brand_fk = $p_d['brand'];
                                                    $sub = $p_d['price_p'] * $d['quantity'];
                                                    $tot = $tot + $sub;
                                                    $p_availability = $p_d['product_quantity'];

                                                    $brand_n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM brand WHERE p_k = '$brand_fk'"));

                                            ?>
                                            <tr class="items_order" style="padding:10px !important;">
                                                <td style="border:none;">
                                                     <div class="media box-shadow" style="height:70px;margin-bottom:10px;">
                                                        <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="<?php echo 'admin/uploads/photo/'.$img['image_name'];?>" width="100%" class="mr-3"></div>
                                                        <div class="media-body order_thumnail" style="padding:10px 0px;">
                                                            <h5 style="font-size:16px;padding-bottom:5px;"><?php echo $p_d['name_p'];?></h5>
                                                            <p style="margin-top:-10px;font-size:13px;color:#888;">Brand: <?php echo $brand_n['brand_name'];?></p>
                                                            <p style="margin-top:-20px;font-size:13px;color:#888;">Model: <?php echo $p_d['model_p'];?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="font-weight:700;">P<?php echo number_format($sub);?>.00</td>
                                                <td style="border:none !important;">qty. <?php echo $d['quantity']; ?><br /><em style="font-size: 10px;">P<?php echo number_format($p_d['price_p']);?>.00</em></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form style="display:flex;" id="pla_order_" action="#">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <?php
                                                $acc = mysqli_fetch_assoc(mysqli_query($conn,"SELECT customer_address.province AS province, customer_address.city AS city, customer.name AS name, customer.lastname AS lastname, customer.password AS password, customer_email.c_email AS email, customer_phone.c_phone AS phone FROM customer LEFT JOIN customer_address ON customer.p_k = customer_address.c_fk LEFT JOIN customer_email ON customer.p_k = customer_email.c_fk LEFT JOIN customer_phone ON customer.p_k = customer_phone.c_fk WHERE customer.p_k = '$c_id'"));
                                            ?>
                                            <div class="form-row">
                                                <div class="col"><button class="btn btn-primary" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;width:100%;">place order</button></div>
                                                <div
                                                    class="col-lg-12 contact_title_send">
                                                    <h4 style="font-weight:bolder;font-size:13px;">shipping &amp; billing</h4>
                                            </div>
                                            <div class="col-lg-12 input" style="margin-bottom:15px;margin-top:10px;"><!-- <span class="edit-billing">Edit</span> -->
                                                <div>
                                                    <h6><i class="fas fa-map-marker-alt check-icon" style="font-size:18px;padding-right:5px;"></i><?php echo $acc['name']; ?></h6>
                                                    <p style="padding-left:15px;font-size:12px;">
                                                            <?php echo  $_SESSION['city']. " " .$_SESSION['province'] . " " . $_SESSION['brgy']; ?></p><!-- <span class="edit-billing">Edit</span> --></div>
                                                <div>
                                                    <h6><i class="fa fa-money check-icon" style="font-size:18px;padding-right:5px;"></i>Bill on the same address</h6><!-- <span class="edit-billing">Edit</span> --></div>
                                                <div>
                                                    <h6><i class="fa fa-phone check-icon" style="font-size:18px;padding-right:5px;"></i><?php echo $acc['phone']; ?></h6>
                                                </div>
                                                <div>
                                                    <div><!-- <span class="edit-billing" id="email_up">Edit</span> -->
                                                        <h6><i class="fa fa-envelope check-icon" style="font-size:18px;padding-right:5px;"></i><?php echo $acc['email']; ?></h6>
                                                    </div>
                                                    <div style="display: none;" id="email_form">
                                                        <div style="display:flex;">
                                                            <div style="position:relative;width:100%;"><input class="form-control" type="text" placeholder="abs@gmail.com"><i class="far fa-times-circle" style="position:absolute;right:5px;top:10px;font-size:20px;color:#999;cursor:pointer;"></i></div>
                                                            <button
                                                                class="btn btn-primary" type="button" style="margin-left:5px;text-transform:uppercase;font-size:13px;padding:0px 31px;font-weight:bold;background-color:#1a9cb7;">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-row" style="/*padding:0px 15px;*/">
                                            <div class="col">
                                                <aside style="/*padding:5px 10px;*/">
                                                    <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;font-size:13px;">order details</h6>
                                                    <ul class="list-unstyled cat_list">
                                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;"><span>Cart Subtotal&nbsp;<em>(<?php echo $_SESSION['quantity_in_cart'];?> items)</em></span><span style="float:right;">P<?php echo number_format($_SESSION['sub_tot']);?>.00</span></li>
                                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;"><span>Shipping &amp; Handling fee</span><span style="float:right;">$150.00</span></li>
                                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;color:#ff7f00;font-weight:bolder;font-size:17px;"><span>Order Total</span><span style="float:right;">P<?php echo number_format($_SESSION['total']);?>.00</span></li>
                                                    </ul><!--  href="payment_method.php" -->
                                                    <a>
                                                    <button class="btn btn-primary payment_method_link" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;width:100%;">place order</button></a>
                                                </aside>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- end of form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
    include 'footer.php';
?>
<!-- Footer Start Here -->