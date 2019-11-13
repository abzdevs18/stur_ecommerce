<?php
    include 'header.php';
?>
    <!-- Include head in this part -->
    <div style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <aside class="box-shadow" style="padding:5px 10px;">
                        <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">categories</h6>
                        <ul class="list-unstyled cat_list">
                            <?php
                                $cat = mysqli_query($conn,"SELECT * FROM category");
                                while($row = mysqli_fetch_assoc($cat)){
                            ?>
                            <li><a href="#" class="category_link" id="<?php echo $row['p_k']; ?>"><?php echo $row['category_name']; ?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </aside>
                    <aside class="box-shadow" style="padding:5px 10px;margin-top:30px;">
                        <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">Price</h6>
                        <div style="display: flex;position: relative;">
                            <p>Your range:</p><input type="text" id="amount" readonly style="border:0; color:#f6931f;font-style:italic;position: absolute;right: 0;text-align: right;background: none;">
                        </div>
                        <!-- <input type="range" style="width:100%;" id="slider-range"> -->

                        <div id="slider-range" style="width:100%;"></div>
                    </aside>
                    
                    <aside class="box-shadow" style="padding:5px 10px;margin-top:30px;">
                        <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">recent products</h6>
                        <?php
                            $recent = mysqli_query($conn,"SELECT * FROM product ORDER BY timestamp LIMIT 3");
                            while ($recent_product = mysqli_fetch_assoc($recent)) {
                                $product_fk = $recent_product['p_k'];
                                $img_p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$product_fk'"));
                        ?>
                        <div class="media box-shadow receP_" id="<?php echo $product_fk; ?>" style="height:70px;margin-bottom:10px;cursor: pointer;">
                            <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="<?php echo"admin/uploads/photo/".$img_p['image_name']; ?>" width="100%" class="mr-3"></div>
                            <div class="media-body" style="padding:10px 0px;">
                                <h5 style="font-size:16px;"><?php echo $recent_product['name_p']; ?></h5>
                                <p style="margin-top:-10px;font-size:13px;color:#888;">P <?php echo number_format($recent_product['price_p']); ?></p>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </aside>
                </div>
                <div class="col-md-6 col-lg-9">
                    <div class="row box-shadow head_shop" style="display:flex;padding:10px 4px;margin-bottom:20px;">
                        <span>Sort by:</span>
                        <select id="sort_">
                            <optgroup label="This is a group">
                                <option value="12" selected="">All products</option>
                                <option value="13">Price</option>
                                <option value="14">Newest</option>
                                <option value="15">Rating</option>
                            </optgroup>
                        </select>
                        <span style="position:absolute;right:10px;margin:0 10px;"><em style="font-style:normal;">Showing: </em>01-09 of 17</span>
                    </div>
                    <div class="row" id="fileterd_cat">

                    </div>
                    <div class="row">
                        <div class="col-lg-12 box-shadow">
                            <nav>
                                <ul class="pagination" style="position:relative;top:7px;right:0;left:0;">
                                    <li class="page-item"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item"><a class="page-link">1</a></li>
                                    <li class="page-item"><a class="page-link">2</a></li>
                                    <li class="page-item"><a class="page-link">3</a></li>
                                    <li class="page-item"><a class="page-link">4</a></li>
                                    <li class="page-item"><a class="page-link">5</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
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