<?php
    include 'conn.php';
    include 'db_function/data_function.php';
    session_start();
    error_reporting(0);
    $c_id = $_SESSION['user_id'];

    $q_b = mysqli_query($conn,"SELECT * FROM product");
    while($product = mysqli_fetch_assoc($q_b)){
        $id = $product['p_k'];
        $prod_img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$id'"));
    
        ?>
        <!-- Start Featured Products -->
        <div class="col-lg-3 prod_item_cont feat">
            <div class="feat-prod" style="height: 405px;"><a href="product_preview.php?prodId=<?php echo $id;?>"><img src="<?php echo 'admin/uploads/photo/'.$prod_img['image_name'];?>" width="100%" style="background-size:contain;height: 300px;position: relative;"></a>
                <div style="text-align:center;font-family:'Raleway';font-size:14px;font-weight:700;text-transform:uppercase;padding-top:10px;padding-bottom:2px;background-color:#f3f3f3;">
                    <h5 style="margin-bottom:0px;font-weight:800;font-size:13px;"><?php echo $product['name_p']; ?></h5>
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
                        style="color:#666;font-weight:400;line-height:23px;margin-bottom:8px;font-family:'Roboto';font-size:17px;">P <?php echo number_format($product['price_p']); ?></h4>
                        <div class="align-items-left align-content-left" style="width:100%;text-align:center;margin:0 auto;position: relative;">
                            <ul class="list-unstyled flex-grow-0 justify-content-center mx-auto actions_icon" style="display:flex;list-style-type:none;left: 10px !important;position: relative;justify-content: left !important">
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action">
                                        <i class="fa fa-heart" id="wish_list" data-toggle="tooltip" title="Add to wishlist!" data-productID="<?php echo $id; ?>" data-customerID="<?php echo $c_id; ?>"></i>
                                    </a>
                                </li>
                           <!--      <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                </li> -->
                                <li style="width:25px;height:25px;border:1px solid;border-radius:50%;padding:2px;">
                                    <a href="#" class="heart_action cart_">
                                        <i class="fa fa-cart-plus order" id="<?php echo $id; ?>" data-toggle="tooltip" title="Add to cart!"></i>
                                    </a>
                                </li>
                                <input type="hidden" id="cus_id" value="<?php echo $c_id; ?>">
                                <input type="hidden" id="prod_quan" value="1">
                                <!-- <img src="assets/img/ship.png" style="position: absolute;right: 10px;width: 30px;margin: 5px 10px;"> -->
                            </ul>
                        </div>
                </div>
            </div>
        </div>
<!-- End featured Products -->
<?php

    }





?>