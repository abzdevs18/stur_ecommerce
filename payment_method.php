<?php
    include 'header.php';
?>
<div style="margin-top:30px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-10 offset-1 box-shadow" style="padding:15px;">
                <div>
                    <h6 style="text-transform:uppercase;padding-left:10px;border-left:2px solid #ff7f00;font-weight:bolder;color:#666;font-size:13px;">choose payment method</h6>
                    <div class="row no-gutters">
                        <div class="col-lg-8">
                            <div class="row no-gutters" style="padding:0 10px 0 0px;">
                                <div class="col-lg-3" style="height:110px;background-color:#f3f3f3;display:flex;flex-direction:column;text-align:center;"><img src="assets/img/credit.png" style="width:50px;margin:0 auto;margin-top:13px;" /><span style="font-size:13px;font-weight:bolder;">Debit/Credit card</span>
                                    <div style="width:100%;min-height:100%;position:absolute;background-color:rgba(137,137,137,0.12);"></div>
                                </div>
                                <div class="col-lg-3" style="height:110px;background-color:#f3f3f3;display:flex;flex-direction:column;text-align:center;padding: 0 3px;"><img src="assets/img/gcash.png" style="width:50px;margin:0 auto;margin-top:13px;" /><span style="font-size:13px;font-weight:bolder;">GCash</span>
                                    <div style="width:100%;min-height:100%;position:absolute;background-color:rgba(137,137,137,0.12);"></div>
                                </div>
                                <div class="col-lg-3" style="height:110px;background-color:#f3f3f3;display:flex;flex-direction:column;text-align:center;padding: 0 3px;"><img src="assets/img/bdo.png" style="width:50px;margin:0 auto;margin-top:13px;" /><span style="font-size:13px;font-weight:bolder;">BDO</span>
                                    <div style="width:100%;min-height:100%;position:absolute;background-color:rgba(137,137,137,0.12);"></div>
                                </div>
                                <div class="col-lg-3 cod_trig" style="height:110px;background-color:#f3f3f3;display:flex;flex-direction:column;text-align:center;cursor: pointer;"><img src="assets/img/cod.png" style="width:50px;margin:0 auto;margin-top:13px;" /><span style="font-size:13px;font-weight:bolder;">Cash On Delivery</span>
                                </div>
                            </div>
                            <div class="row no-gutters cod_op" style="padding-right:10px;margin-top:8px;display: none;">
                                <div class="col-lg-12" style="background-color:#f3f3f3;">
                                    <p style="padding:15px;font-size:14px;color:#777;padding-bottom:5px;">Pay using our Cash on Delivery service. Full payment is done directly to the courier. No partial down payments required. We highly recommend you to use Lazada Wallet for a better shopping experience! Enjoy exclusive
                                        cashback offers, faster refunds, and convenient one-click payments with Lazada Wallet! Cash in over-the-counter (7-Eleven, M Lhuillier, TrueMoney, SM Bills) or through online banking (BDO, Metrobank).</p>
                                    <button class="btn btn-primary place_btn" type="button" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">Confirm order</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div style="background-color:#f3f3f3;padding:8px;border-radius:3px;">
                                <h5 style="margin-top:25px;margin-right:10px;position:relative;">Order Summary</h5>
                                <ul class="list-unstyled cat_list">
                                    <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;"><span style="font-size:13px;">Subtotal(<?php echo $_SESSION['quantity_in_cart'];?> items and shipping fee)</span><span style="float:right;">P<?php echo number_format($_SESSION['total']);?>.00</span></li>
                                    <li style="border-bottom:1px solid #dee2e6;padding:3px 0px;color:#ff7f00;font-weight:bolder;font-size:17px;"><span>Order Total</span><span style="float:right;">P<?php echo number_format($_SESSION['total']);?>.00</span></li>
                                </ul>
                            </div>
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