<?php
    include 'header.php';
?>
    <!-- Include head in this part -->
    <div style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact_add box-shadow"><span class="contact_icon"><i class="fas fa-map-marker-alt"></i></span>
                        <h6 class="contact_text"><br>House 06, Road 01, Katashur, Mohammadpur,<br><br></h6>
                        <h6 class="contact_text">Dumaguete City</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_add box-shadow"><span class="contact_icon"><i class="fa fa-phone"></i></span>
                        <h6 class="contact_text"><br>333-555-1313<br><br></h6>
                        <h6 class="contact_text">+63936-275-8967</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact_add box-shadow"><span class="contact_icon"><i class="fa fa-envelope"></i></span>
                        <h6 class="contact_text">stur@gmail.com</h6>
                        <h6 class="contact_text" style="margin-top:2px;">stur@info.com</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 box-shadow" style="padding:15px;">
                    <div>
                        <div class="col-lg-12 contact_title_send">
                            <h4 style="font-weight:bolder;">get in touch</h4>
                        </div>
                        <!-- Execution Script in loading_product.js -->
                        <form id="msg_cont" method="POST" action="inc/db_function/contact_msg.php" >
                            <div class="col-lg-6 input">
                                <input class="form-control" type="text" placeholder="First Name" name="name">
                            </div>
                            <div class="col-lg-6 input">
                                <input class="form-control" type="text" placeholder="Last Name" name="lname">
                            </div>
                            <div class="col-lg-6 input">
                                <input class="form-control" type="email" placeholder="Email" name="email">
                            </div>
                            <div class="col-lg-6 input">
                                <input class="form-control" type="text" placeholder="Message subject" name="sub_msg">
                            </div>
                            <div class="col-lg-12" style="position:inherit !important;">
                                <textarea class="form-control" placeholder="Message" style="overflow:auto;height:110px;resize:vertical;" name="content"></textarea>
                            </div>
                            <button class="btn btn-primary cntact_msg" type="submit" name="submit" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
?>
<!-- Footer Start Here -->