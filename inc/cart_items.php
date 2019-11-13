 <div class="table-responsive">
 <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">cart items</h6>
 <table class="table cart_table">
     <thead>
         <tr>
             <!-- <th><input type="checkbox" name=""></th> -->
             <th style="width:400px;">product</th>
             <th>price</th>
             <th>quantity</th>
             <th>total</th>
             <th>remove</th>
         </tr>
     </thead>
     <tbody>
     <?php
         session_start();
         $c_id = $_SESSION['user_id'];
         include 'conn.php';

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
     <!-- Cart Items Here -->
     <tr>
         <!-- <td><input type="checkbox" name=""></td> -->
         <td>
             <a href="product_preview.php?prodId=<?php echo $p_k; ?>" style="text-decoration: none;color: #888;">
             <div class="media box-shadow" style="height:70px;margin-bottom:10px;">
                 <div style="width:45%;padding-right:10px;overflow:hidden;height:100%;align-items:center;"><img src="<?php echo 'admin/uploads/photo/'.$img['image_name'];?>" width="100%" class="mr-3"></div>
                 <div class="media-body order_thumnail" style="padding:10px 0px;">
                     <h5 style="font-size:16px;padding-bottom:5px;"><?php echo $p_d['name_p'];?></h5>
                     <p style="margin-top:-10px;font-size:13px;color:#888;">Brand: <?php echo $brand_n['brand_name'];?></p>
                     <p style="margin-top:-20px;font-size:13px;color:#888;">Model: <?php echo $p_d['model_p'];?></p>
                 </div>
             </div>
             </a>
         </td>
         <td style="font-weight:700;">P<?php echo number_format($p_d['price_p']);?>.00</td>
         <td>
         <div class="d" style="padding-bottom: 6px;">
             <span id="pl_d_" class="<?php echo $i_id; ?>" style="font-size: 25px;font-weight: bold;cursor: pointer;margin-right: 5px;">-</span>
             <!-- <input type="hidden" name="quantity[]" value="'.$row['quantity'].'"> -->
             <input name="quantity[]" value="<?php echo $d['quantity']; ?>" min="1" class="ki_d_<?php echo $i_id; ?>" id="quan_prod" style="width: 40px;height: 22px;text-align: center;font-size: 16px;">
             <span id="kop" class="<?php echo $i_id; ?>" style="font-size: 25px;font-weight: bold;cursor: pointer;margin-right: 5px;position: relative;top: 3px;">+</span>
             <!-- <input type="hidden" name="prod_id[]" value="<?php echo $i_id; ?>"> -->
             <input type="hidden" value="<?php echo $c_id; ?>" id="p_id_">
         </div>
             <?php
             if ($p_availability < 1) {
                 echo "<p style='font-style: italic;font-size: 9px;color: red;font-weight: bold;'>Product out of stock</p>";
             }
             ?>
         </td>
         <td style="font-weight:700;">P<?php echo number_format($sub);?>.00</td>
         <td style="text-align:center;"><i class="fa fa-close remove_cart" id="<?php echo $i_id; ?>" data-product="<?php echo $p_k; ?>" data-customer="<?php echo $c_id; ?>" style="font-size:20px;text-align:center;padding:0;"></i></td>
     </tr>
     <!-- Cart items Ends Here -->
     <?php
 }
 $total = $tot + 150;
 $_SESSION['total'] = $total;
 $_SESSION['quantity_in_cart'] = $quantity_in_cart;
 $_SESSION['sub_tot'] = $tot;
 ?>
     </tbody>
 </table>
</div>
<div class="row">
    <div class="col">
        <aside class="box-shadow" style="padding:5px 10px;">
            <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;">payment details</h6>
            <ul class="list-unstyled cat_list">
                <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;"><span>Cart Subtotal <em>(<?php echo $quantity_in_cart; ?> items)</em></span><span style="float:right;">P<?php echo number_format($tot);?>.00</span></li>
                <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;"><span>Shipping and Handling</span><span style="float:right;">P150.00</span></li>
                <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;color:#ff7f00;font-weight:bolder;font-size:17px;"><span>Order Total</span><span style="float:right;">P<?php echo number_format($total);?>.00</span></li>
            </ul>
            <a href="check_out.php">
            <button class="btn btn-primary" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;">check out</button>
            </a>
        </aside>
    </div>
</div>