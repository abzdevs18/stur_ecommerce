<?php
    include 'header.php';
    // include 'inc/db_function/data_function.php';
    $id = $_REQUEST['prodId'];

    $prod_prev = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE p_k = '$id'"));
    $prod_img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$id'"));
    $product_details = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_details WHERE product_fk = '$id'"));
?>
    <!-- Include head in this part -->
    <section style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="image_wraper_preview" style="height: 495px !important;background-size: cover;background-image: url('<?php echo 'admin/uploads/photo/'.$prod_img['image_name'];?>');box-shadow: 0px -1px 14px -1px #999;border-radius: 3px;"></div>
                </div>
                <div class="col-lg-7">
                    <div>
                        <h3 style="font-size:20px;font-weight:800;color:#888;"><?php echo $prod_prev['name_p']; ?></h3>
                        <div style="display:flex;">
                            <h6 style="font-style:italic;color:#666;"><?php echo $prod_prev['model_p']; ?></h6>
                            <div class="float-right rating_wrap" style="padding-left:10px;top:-5px;margin-top:-5px;">
                                            <?php
                                                $rating = counting_rating($id,$c_id,$conn);
                                                $num_people = counting_row($id,$c_id,$conn);
                                                if ($num_people < 1) {?>
                                                   <span style="padding:0px 3px;font-size:12px;text-transform: capitalize;font-style: italic;">No rating yet</span>
                                                <?php } else {?>
                                                <div style="display: inline-block;">
                                                    <?php
                                                        for($count = 1; $count <= 5; $count++){
                                                            if ($count <= $rating) {
                                                                $color="color:#ff7f00;";
                                                            }else{
                                                                $color = "color:#999;";
                                                            }

                                                            $out_star = '<a href="#"><i class="fa fa-star" style="'.$color.'" data-index="'.$count.'" data-product_id="'.$id.'" data-rating="'.$rating.'"></i></a>';
                                                            echo $out_star;
                                                        }
                                                    ?>
                                                </div>
                                                    <span style="padding:0px 3px;font-size:13px;">(<?php echo $num_people; ?>)</span>
                                            <?php
                                                }
                                            ?>
                            </div>
                        </div>
                        <hr style="padding-top:20px;margin-bottom:0px;">
                    </div>
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">INFORMATION</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">WHATS IN THE BOX</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">REVIEWS</a></li>
                        </ul>
                        <!-- There are many variations of passages of Lorem Ipsum available, but the majo Rity have be suffered alteration in some form, by injected humou or randomis Rity have be suffered alteration in some form, by injectedhumou or randomis words which donot look even slightly believable. If you are going to use a passage Lorem Ipsum. -->
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <p class="justify-content-between align-content-center">
                                    <?php echo $product_details['description_p']; ?>
                                </p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-2">
                                <p>
                                    <?php echo $product_details['information']; ?>
                                </p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-3">

                                <?php

                                    $def = mysqli_query($conn,"SELECT * FROM customer_feedback WHERE p_fk = '$id'");
                                    while ($rows = mysqli_fetch_assoc($def)) {
                                        $id_f = $rows['c_fk'];
                                        $img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer_image WHERE c_fk = '$id_f' AND profile_status = 1"));
                                        $name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE p_k = '$id_f'"));
                                ?>
                                    <div style="margin-top:10px;">
                                        <div class="media">
                                            <div style="width: 80px;height: 60px;overflow: hidden;margin-right: 10px;border-radius: 4px;">
                                                <img src="<?php echo"inc/uploaded/".$img['image_name']; ?>" class="mr-3" style="width: 100%;">
                                            </div>
                                            <div class="media-body">
                                                <h5 style="font-weight:bold;text-transform:uppercase;font-size:15px;padding-bottom:0px;margin-bottom:0px;"><?php echo $name['name']?></h5>
                                                <div class="float-right rating_wrap" style="padding-left:10px;top:-17px;margin-top:-5px;position: relative;">
                                                                <?php
                                                                    $rating = counting_rating($id,$id_f,$conn);?>
                                                                    <div style="display: inline-block;">
                                                                        <?php
                                                                            for($count = 1; $count <= 5; $count++){
                                                                                if ($count <= $rating) {
                                                                                    $color="color:#ff7f00;";
                                                                                }else{
                                                                                    $color = "color:#999;";
                                                                                }

                                                                                $out_star = '<a href="#"><i class="fa fa-star" style="'.$color.'" data-index="'.$count.'" data-product_id="'.$id.'" data-rating="'.$rating.'"></i></a>';
                                                                                echo $out_star;
                                                                            }
                                                                        ?>
                                                                    </div>
                                                </div>
                                                <h6 style="padding-bottom:0px;"><?php echo $rows['date']?> at <?php echo $rows['time']?></h6>
                                                <p style="color:#666;font-size:13px;"><?php echo $rows['content']?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    $sel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders WHERE c_fk ='$c_id' AND product_fk = '$id'"));
                                    if ($sel > 0) {
                                ?>
                                <div class="row no-gutters box-shadow" style="padding:10px;">
                                    <div class="col-lg-12">
                                            <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;font-size:13px;">Leave seller feedback</h6>
                                            <div class="float-left rating_wrap" style="padding-left:10px;top:-5px;margin-top:-5px;">
                                            <div style="display: inline-block;">

                                                <?php
                                                    $rating = counting_rating($id,$c_id,$conn);

                                                    for($count = 1; $count <= 5; $count++){
                                                        if ($count <= $rating) {
                                                            $color="color:#ff7f00;";
                                                        }else{
                                                            $color = "color:#999;";
                                                        }

                                                        $out_star = '<a href="#"><i class="fa fa-star rating" style="'.$color.'" id="'.$id.'-'.$count.'" data-index="'.$count.'" data-product_id="'.$id.'" data-rating="'.$rating.'"></i></a>';
                                                        echo $out_star;
                                                    }
                                                ?>
                                            </div>
                                                <span style="padding:0px 3px;font-size:13px;font-style: italic;">(Your rating)</span>
                                            </div>
                                        <form method="POST" action="inc/db_function/feedback_insert.php">
                                            <div style="width:100%;margin-bottom:10px;">
                                                <input type="hidden" name="product_ID" value="<?php echo $id; ?>">
                                                <input type="hidden" name="customer_ID" value="<?php echo $c_id; ?>">
                                                <input class="form-control box-shadow" type="text" name="content" placeholder="Your comments..." style="width:100%;padding:3px;border:none;padding-left:9px;">
                                            </div>
                                            <button class="btn btn-primary" type="submit" name="submit" style="border:medium none;color:rgb(255,255,255);font-size:10px;font-weight:700;text-transform:uppercase;transition:all .5s;height:28px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">send feedback</button>
                                        </form>
                                </div>
                            </div>
                            <?php
                                }
                                ?>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="align-content-end" style="width:100%;text-align:center;margin:0 auto;">
                            <ul class="list-unstyled float-right flex-grow-0 justify-content-center mx-auto actions_icon" style="display:flex;list-style-type:none;">
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-heart"></i></a></li>
                             <!--    <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-refresh"></i></a></li> -->
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-cart-plus cart_"></i></a></li>
                            </ul>
                            <div class="float-left" style="display:flex;margin-top:-10px;">
                                <div style="text-align:center;position:relative;margin-top:12px;margin-right:15px;"><span>QTY</span></div>
                                <div class="d" style="padding-bottom: 6px;">
                                    <span id="ko_d" class="<?php echo $id; ?>" style="font-size: 25px;font-weight: bold;cursor: pointer;margin-right: 5px;">-</span>
                                    <input type="hidden" name="quantity[]" value="'.$row['quantity'].'">
                                    <input name="quantity[]" value="1" min="1" class="ki_d_<?php echo $id; ?>" id="quan_prod" style="width: 40px;height: 22px;text-align: center;">
                                    <span id="ko_" class="<?php echo $id; ?>" style="font-size: 25px;font-weight: bold;cursor: pointer;margin-right: 5px;position: relative;top: 3px;">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top:60px;">
                    <div><strong>Price: P <?php echo number_format($prod_prev['price_p']); ?></strong></div>
                    <hr style="margin-top:16px;"><button class="btn btn-primary" id="buy_this" style="background-color:#333;outline:none;border:#333;" data-productID="<?php echo $id; ?>" data-customerID="<?php echo $c_id; ?>">Buy now</button></div>
            </div>
        </div>
    </section>
    <div class="slide_item_s" style="margin-top:30px;">
        <div class="container">
            <div>
                <h1 class="item_head">related product</h1><small style="font-size:16px;">There are many variations of passages of brands available,</small></div>
            <div class="row" style="padding:50px 0px 5px;">
                        <?php
                            $brand = $prod_prev['brand'];
                            $item = mysqli_query($conn,"SELECT * FROM product WHERE brand = '$brand' AND p_k != '$id'");
                            while ($prod = mysqli_fetch_assoc($item)) {
                                $id = $prod['p_k'];
                                $prod_img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$id'"));
                        ?>
                        <div class="col-lg-3 prod_item_cont feat">
                            <div class="feat-prod" style="height: 405px;">
                                <a href="product_preview.php?prodId=<?php echo $id;?>">
                                    <img src="<?php echo 'admin/uploads/photo/'.$prod_img['image_name'];?>" width="100%" style="background-size:contain;height: 300px;position: relative;">
                                </a>
                                <div style="text-align:center;font-family:'Raleway';font-size:14px;font-weight:700;text-transform:uppercase;padding-top:10px;padding-bottom:2px;background-color:#f3f3f3;">
                                    <h5 style="margin-bottom:0px;font-weight:800;font-size:13px;"><?php echo $prod['name_p']; ?></h5>
                                    <div class="rating_wrap">

                                            <?php
                                                $rating = counting_rating($id,$c_id,$conn);
                                                $num_people = counting_row($id,$c_id,$conn);
                                                if ($num_people < 1) {?>
                                                   <span style="padding:0px 3px;font-size:12px;text-transform: capitalize;font-style: italic;">No rating yet</span>
                                                <?php } else {?>
                                                <div style="display: inline-block;">
                                                    <?php
                                                        for($count = 1; $count <= 5; $count++){
                                                            if ($count <= $rating) {
                                                                $color="color:#ff7f00;";
                                                            }else{
                                                                $color = "color:#999;";
                                                            }

                                                            $out_star = '<a href="#"><i class="fa fa-star" style="'.$color.'" id="'.$id.'-'.$count.'" data-index="'.$count.'" data-product_id="'.$id.'" data-rating="'.$rating.'"></i></a>';
                                                            echo $out_star;
                                                        }
                                                    ?>
                                                </div>
                                                    <span style="padding:0px 3px;font-size:13px;">(<?php echo $num_people; ?>)</span>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                    <h4
                                        style="color:#666;font-weight:400;line-height:23px;margin-bottom:8px;font-family:'Roboto';font-size:17px;">P <?php echo number_format($prod['price_p']); ?></h4>
                        <div class="align-items-center align-content-center" style="width:100%;text-align:center;margin:0 auto;">
                            <ul class="list-unstyled flex-grow-0 justify-content-center mx-auto actions_icon" style="display:flex;list-style-type:none;">
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action">
                                        <i class="fa fa-heart" id="wish_list" data-toggle="tooltip" title="Add to wishlist!" data-productID="<?php echo $id; ?>" data-customerID="<?php echo $c_id; ?>">
                                            
                                        </i>
                                    </a>
                                </li>
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </li>
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action cart_"><i class="fa fa-cart-plus order" id="<?php echo $id; ?>" data-toggle="tooltip" title="Add to cart!"></i>
                                    </a>
                                </li>
                                <input type="hidden" id="cus_id" value="<?php echo $c_id; ?>">
                                <input type="hidden" id="prod_quan" value="1">
                            </ul>
                        </div>
                                </div>
                            </div>
                        </div>
                            <?php
                                }
                            ?>
<!--                 <div class="col-lg-4 prod_item_cont feat">
                    <div class="feat-prod"><a href="product_preview.html"><img src="assets/img/6.jpg" width="100%" style="background-size:contain;"></a>
                        <div style="text-align:center;font-family:'Raleway';font-size:14px;font-weight:700;text-transform:uppercase;padding-top:10px;padding-bottom:2px;background-color:#f3f3f3;">
                            <h5 style="margin-bottom:0px;font-weight:800;font-size:13px;">Product name</h5>
                            <div class="rating_wrap"><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i></a><a href="#"><i class="fa fa-star"></i><span style="padding:0px 3px;font-size:13px;">(8)</span></a></div>
                            <h4
                                style="color:#666;font-weight:400;line-height:23px;margin-bottom:8px;font-family:'Roboto';font-size:17px;">$ 869.00</h4>
                                <div class="align-items-center align-content-center" style="width:100%;text-align:center;margin:0 auto;">
                                    <ul class="list-unstyled flex-grow-0 justify-content-center mx-auto actions_icon" style="display:flex;list-style-type:none;">
                                        <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-heart"></i></a></li>
                                        <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-refresh"></i></a></li>
                                        <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;"><a href="#" class="heart_action"><i class="fa fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div> -->
            </div><!-- eND OF row -->
        </div>
    </div>
<?php
    include 'footer.php';
?>
<!-- Footer Start Here -->