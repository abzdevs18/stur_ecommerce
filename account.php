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
                <div class="col-md-12 col-lg-8 offset-2">
                    <div role="tablist" id="accordion-1">
                        <!-- Start of Accordion Personal Information -->
                        <div class="card accordion_d">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="div#accordion-1 .item-1">Personal Information</a></h5>
                            </div>
                            <div class="collapse show item-1" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 offset-4 hover_prof" style="padding: 15px;">
                                        <?php
                                        $img = "SELECT * FROM customer_image WHERE c_fk = '$c_id' AND profile_status = 1";
                                        $q_img = mysqli_query($conn,$img);
                                        $row = mysqli_fetch_assoc($q_img);

                                        $acc = mysqli_fetch_assoc(mysqli_query($conn,"SELECT customer_address.province AS province, customer_address.city AS city, customer.name AS name, customer.lastname AS lastname, customer.password AS password, customer_email.c_email AS email FROM customer LEFT JOIN customer_address ON customer.p_k = customer_address.c_fk LEFT JOIN customer_email ON customer.p_k = customer_email.c_fk WHERE customer.p_k = '$c_id'"));
                                        if($row){?>
                                            <div style="margin:0 auto;text-align:center;overflow: hidden;width: 150px;height: 150px;border-radius: 50%;box-shadow: 0px 1px 13px 1px #999;"><img width="100%" src="<?php echo"inc/uploaded/".$row['image_name']; ?>" style="border-radius:50%;height:150px;width:150px;margin:0 auto;" />
                                        <?php
                                            }else{?>
                                            <div style="margin:0 auto;text-align:center;overflow: hidden;width: 150px;height: 150px;border-radius: 50%;box-shadow: 0px 1px 13px 1px #999;"><img width="100%" src="assets/img/icon.jpg" style="border-radius:50%;height:150px;width:150px;margin:0 auto;" />
                                        <?php
                                            }?>
                                                <form method="POST" action="inc/prof_up.php" id="update_now" enctype="multipart/form-data">
                                                    <div style="background: #555;line-height: 5;vertical-align: middle;top: 0px;position: relative;transition: all .5s ease-in-out;" class="container_profile">
                                                        <i class="fas fa-camera" style="font-size: 40px;color: #fff;"></i>
                                                        <input type="file" name="photo" id="prof_holder" style="position: absolute;width: 44px;background: red;left: 52px;height: 38px;overflow: hidden;top: 14px;border-radius: 4px;opacity: 0;">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="First Name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value=" <?php echo $acc['name']; ?> ">
                                            </div>
                                <!--             <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Last Name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div> -->
                                            <div class="box-shadow">
                                                <select style="width:100%;padding:5px 7px;color:#666;border:none;">
                                                    <optgroup label="Provinces">
                                                        <?php
                                                            $province = $acc['province'];
                                                            ?>
                                                        <option value="1"<?php if ($province == 1) {
                                                            echo "selected";
                                                            $_SESSION['province'] = "Negros Oriental";

                                                        }
                                                            ?>>Negros Oriental</option>
                                                        <option value="2"<?php if ($province == 2) {echo "selected";
                                                            $_SESSION['province'] = "Negros Occ";}?>>Negros Occ</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Last Name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value=" <?php echo $acc['lastname']; ?> ">
                                            </div>
                                        <!--     <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Your Name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div> -->
                                            <div class="box-shadow">
                                                <select style="width:100%;padding:5px 7px;color:#666;border:none;">
                                                    <optgroup label="Provinces">
                                                        <?php
                                                            $city = $acc['city'];
                                                            ?>
                                                        <option value="1"<?php if ($city == 1) {echo "selected";
                                                            $_SESSION['city'] = "Dumaguete City";}?>>Dumaguete City</option>
                                                        <option value="2"<?php if ($city == 2) {echo "selected";
                                                            $_SESSION['city'] = "Bais City";
                                                            $_SESSION['brgy'] = "Taclobo";
                                                        }?>>Bais City</option>

                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="margin-top:15px;">
                                        <!--     <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Your Name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div> -->
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="email" placeholder="Email address here..." class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value=" <?php echo $acc['email']; ?> ">
                                            </div>
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="password" placeholder="Password" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div>
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="password" placeholder="Confirm Password" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div>
                                        </div>
                                        <div class="col"><button class="btn btn-primary" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">Save</button>
                                    <!--         <button
                                                class="btn btn-primary float-right" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">Clear</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card accordion_d">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="div#accordion-1 .item-3">Billing Information</a></h5>
                            </div>
                            <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                                <div class="card-body">
                                    <div class="row">
                                        <?php 
                                            $bill_detail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM billing_info WHERE c_fk = '$c_id'"));
                                        ?>
                                        <div class="col-lg-12" style="margin-top:15px;">
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Full name" class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value="<?php echo $bill_detail['name']; ?>">
                                            </div>
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Email address here..." class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value="<?php echo $bill_detail['email']; ?>">
                                            </div>
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="text" placeholder="Phone here..." class="box-shadow" style="width:100%;padding:3px;border:none;padding-left:9px;" value="<?php echo $bill_detail['phone']; ?>">
                                            </div>
                                            <div class="box-shadow ac_margin_bt">
                                                <select style="width:100%;padding:5px 7px;color:#666;border:none;">
                                                    <optgroup label="Provinces">
                                                        <?php
                                                            $province = $bill_detail['province'];
                                                            ?>
                                                        <option value="p_1"<?php if ($province == 'p_1') {echo "selected";}?>>Negros Oriental</option>
                                                        <option value="p_2"<?php if ($province == 'p_2') {echo "selected";}?>>Negros Occ</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="box-shadow ac_margin_bt">
                                                <select style="width:100%;padding:5px 7px;color:#666;border:none;">
                                                    <optgroup label="City">
                                                        <?php
                                                            $city = $bill_detail['city'];
                                                            ?>
                                                        <option value="c_1"<?php if ($city == 'c_1') {echo "selected";}?>>Dumaguete City</option>
                                                        <option value="c_2"<?php if ($city == 'c_2') {echo "selected";}?>>Bais City</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="box-shadow ac_margin_bt">
                                                <select style="width:100%;padding:5px 7px;color:#666;border:none;">
                                                    <optgroup label="Barangay">
                                                        <?php
                                                            $brgy = $bill_detail['brgy'];
                                                            ?>
                                                        <option value="b_1"<?php if ($brgy == 'b_1') {
                                                            echo "selected";
                                                            $_SESSION['brgy'] = "Taclobo";
                                                        }?>>Taclobo</option>
                                                        <option value="b_2"<?php if ($brgy == 'b_2') {echo "selected";
                                                            $_SESSION['brgy'] = "Daro";}?>>Daro</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 box-shadow" style="position:inherit !important;padding: 0px;">
                                                <textarea class="form-control" placeholder="Additional Information" style="overflow:auto;height:110px;resize:vertical;"><?php if ($bill_detail['additional_info'] != '') {echo $bill_detail['additional_info'];}else{echo "";}?></textarea>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">Save</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab">
                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-4" href="div#accordion-1 .item-4">My Orders</a></h5>
                    </div>
                    <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                        <div class="card-body">
                            <div class="row box-shadow" style="margin-top:10px;background-color: #f3f3f3;">
                                <div class="col-lg-12">
                                    <div style="margin-top:10px;margin-bottom:-10px;">
                                        <h6 style="font-size:13px;"><span>Order #:</span>201303996</h6>
                                        <p style="font-size:10px;top:-10px;position:relative;">Placed on 22 Mar 2019 19:46:18<br /></p>
                                    </div>
                                    <hr />
                                    <div class="table-responsive" style="overflow: hidden;">
                                        <table class="table cart_table">
                                            <thead style="text-align:left;">
                                                <tr style="text-align:left !important;"></tr>
                                            </thead>
                                            <tbody style="border:none;">
                                                <tr class="items_order" style="padding:10px !important;">
                                                    <td style="border:none;width:260px;">
                                                        <div class="media box-shadow" style="height:70px;margin-bottom:10px;">
                                                            <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="assets/img/6.jpg" width="100%" class="mr-3" /></div>
                                                            <div class="media-body order_thumnail" style="padding:10px 0px;">
                                                                <h5 style="font-size:13px;padding-bottom:5px;">Product Name</h5>
                                                                <p style="margin-top:-10px;font-size:11px;color:#888;">Brand: Grand z8</p>
                                                                <p style="margin-top:-20px;font-size:11px;color:#888;">Model: J4</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border:none !important;">qty. 1</td>
                                                    <td style="border:none !important;">pending</td>
                                                    <td style="font-weight:700;font-size: 9px;border:none;">Get by Wed 27 Mar - Mon 01 Apr</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive" style="overflow: hidden;">
                                        <table class="table cart_table">
                                            <thead style="text-align:left;">
                                                <tr style="text-align:left !important;"></tr>
                                            </thead>
                                            <tbody style="border:none;">
                                                <tr class="items_order" style="padding:10px !important;">
                                                    <td style="border:none;width:260px;">
                                                        <div class="media box-shadow" style="height:70px;margin-bottom:10px;">
                                                            <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="assets/img/6.jpg" width="100%" class="mr-3" /></div>
                                                            <div class="media-body order_thumnail" style="padding:10px 0px;">
                                                                <h5 style="font-size:13px;padding-bottom:5px;">Product Name</h5>
                                                                <p style="margin-top:-10px;font-size:11px;color:#888;">Brand: Grand z8</p>
                                                                <p style="margin-top:-20px;font-size:11px;color:#888;">Model: J4</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border:none !important;">qty. 1</td>
                                                    <td style="border:none !important;">pending</td>
                                                    <td style="font-weight:700;font-size: 9px;border:none;">Get by Wed 27 Mar - Mon 01 Apr</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<!--                             <div class="col-lg-12">
                                <aside class="box-shadow" style="padding:5px 10px;">
                                    <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">order details</h6>
                                    <ul class="list-unstyled cat_list">
                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;">
                                            <span>Cart Subtotal</span>
                                            <span style="float:right;">$155.00</span>
                                        </li>
                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;">
                                            <span>Shipping and Handling</span>
                                            <span style="float:right;">$155.00</span>
                                        </li>
                                        <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;color:#ff7f00;font-weight:bolder;font-size:17px;">
                                            <span>Order Total</span>
                                            <span style="float:right;">$310.00</span>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;">check out</button>
                                </aside>
                            </div> -->
                        </div>
                    </div>
                </div>
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