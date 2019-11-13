<?php
    include 'header.php';
?>
    <!-- Include head in this part -->
    <section style="margin-top:10px;">
        <div class="container-fluid" style="/*padding:0px;*/">
            <div class="row">
                <div class="col">
                    <div data-ride="carousel" class="carousel slide" id="carousel-1">
                        <div role="listbox" class="carousel-inner">
                            <div class="carousel-item active" style="transition: all .9s;">
                                <div class="my-lg-auto" style="width:100%;min-height:100%;display:flex;position:relative;">
                                    <div class="right_slide box-shadow" style="background-image:url(&quot;assets/img/1.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;"></div>
                                    <div class="my-lg-auto left_slide box-shadow">
                                        <h2 style="padding-bottom:20px;">WATERPROOF SMARTPHONES</h2>
                                        <p style="font-size:15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do<br />eiusmod tempor incididunt ut labore et dolores top magna aliqua. Ut enim<br />ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut<br />aliquip
                                            ex ea commodo consequat. laborum.<br /></p><button class="btn btn-primary" type="button" style="width:150px;background-color:#444;border:none;margin-top:30px;">BUY NOW</button></div>
                                </div>
                            </div>
                            <div class="carousel-item" style="transition: all .9s;">
                                <div class="my-lg-auto" style="width:100%;min-height:100%;display:flex;position:relative;">
                                    <div class="right_slide" style="background-image:url(&quot;assets/img/2.jpg&quot;);background-position:center;background-size:cover;background-repeat:no-repeat;"></div>
                                    <div class="my-lg-auto left_slide">
                                        <h2 style="padding-bottom:20px;">AFFORDABLE SMARTPHONES</h2>
                                        <p style="font-size:15px;">Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do<br />eiusmod tempor incididunt ut labore et dolores top magna aliqua. Ut enim<br />ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut<br />aliquip
                                            ex ea commodo consequat. laborum.<br /></p><button class="btn btn-primary" type="button" style="width:150px;background-color:#444;border:none;margin-top:30px;">BUY NOW</button></div>
                                </div>
                            </div>
                        </div>
                        <div><a href="#carousel-1" role="button" data-slide="prev" class="carousel-control-prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a href="#carousel-1" role="button" data-slide="next" class="carousel-control-next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <ol
                            class="carousel-indicators">
                            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-1" data-slide-to="1"></li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="slide_item_s">
        <div class="container">
            <div>
                <h1 class="item_head">by brands</h1><small style="font-size:16px;">There are many variations of passages of brands available,</small></div>
            <div class="row" style="padding:50px 0px 5px;">
                <?php
                    $q_b = mysqli_query($conn,"SELECT * FROM brand");
                    while($brand = mysqli_fetch_assoc($q_b)){?>
                        <div class="col-lg-3 prod_item_cont box-shadow brand_" id="<?php echo $brand['p_k']; ?>" style="background-image: url('<?php echo 'admin/uploads/photo/'.$brand['image_path'];?>');height: 200px;background-size: cover;background-position: center;background-repeat: no-repeat;margin: 0 10px;border-radius: 3px;box-shadow: 0 0 10px rgba(0,0,0,.1);cursor: pointer;">
                            <!-- <img src="assets/img/6.jpg" width="100%" style="background-size:contain;"> -->
                            <h3 class="brand_name" style="color: #999;"><?php echo $brand['brand_name']; ?></h3>
                        </div>
                <?php

                    }

                ?>
            </div>
        </div>
    </div>
    <div class="slide_item_s">
        <div class="container">
            <div>
                <h1 class="item_head">featured product</h1><small style="font-size:16px;">There are many variations of passages of brands available,</small></div>
            <div class="row featured_prod" style="padding:50px 0px 5px;">
                <!-- Product From loading_products.js shown in here -->
            </div>
        </div>
    </div>
    <div class="slide_item_s">
        <div class="container">
            <div>
                <h1 class="item_head">product list</h1>
                <div class="pop_prod" style="width:100%;position:relative;"><small style="font-size:16px;">There are many variations of passages of brands available,</small>
                    <ul class="filter_nav" style="float:right;display:flex;position:absolute;list-style-type:none;right:0;">
                        <li style="cursor: pointer;" class="active_filter top_ar 1">Top Rated Products</li>
                        <li class="new_ar 2" style="cursor: pointer;">New Arrival</li>
                        <li style="cursor: pointer;" class="best_ar 3">Best Seller</li>
                    </ul>
                </div>
            </div>
            <!-- Feature Products -->
            <div class="row" id="product_list_f" style="padding:50px 0px 5px;">

            </div>
            <!-- End of Product Row -->
                <!-- <div class="row"> -->
               <!--      <div class="col-lg-12 box-shadow" style="line-height: 3;vertical-align: middle;text-align: center;">
                        <a href="product_items.php"><p>Show More...</p></a>
                    </div> -->
                <!-- </div> -->
        </div>
    </div>
<?php
    include 'footer.php';
?>
<!-- Footer Start Here -->
 