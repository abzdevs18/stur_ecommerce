<?php
    include 'header.php';
?>
    <!-- Include head in this part -->
    <div style="margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 contact_title_send">
                    <div style="border-left:2px solid #ff7f00;">
                        <h6 style="padding-left:10px;"><strong>REGISTERED CUSTOMERS</strong><br></h6>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted card-subtitle mb-2"><br>If you have an account with us, Please log in.<br></h6>
                            <form method="POST" action="inc/login.php">
                                <div class="box-shadow log_del" style="width:100%;">
                                    <input type="text" name="email" placeholder="Email" style="width:100%;">
                                </div>
                                <div class="box-shadow log_del" style="width:100%;">
                                    <input type="password" name="password" placeholder="Password" style="width:100%;">
                                </div>
                                <button class="btn btn-primary" type="submit" name="login" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;margin-top:30px;">login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 contact_title_send">
                    <div style="border-left:2px solid #ff7f00;">
                        <h6 style="padding-left:10px;"><strong>NEW CUSTOMERS</strong><br></h6>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted card-subtitle mb-2"><br>If you have an account with us, Please log in.<br></h6>
                            <form method="POST" action="inc/signup.php" autocomplete="on">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box-shadow log_del" style="width:100%;">
                                        <input type="text" placeholder="Name" name="name" style="width:100%;" autocomplete="off">
                                    </div>
                                    <div class="box-shadow log_del" style="width:100%;">
                                        <select name="province" style="width:100%;padding:5px 7px;color:#666;border:none;">
                                            <optgroup label="Province">
                                                <option value="1" selected="">Negros Oriental</option>
                                                <option value="2">Negros Occ</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box-shadow log_del" style="width:100%;">
                                        <input type="text" placeholder="Lastname" name="lastname" style="width:100%;" autocomplete="off">
                                    </div>
                                    <div class="box-shadow log_del" style="width:100%;">
                                        <select name="city" style="width:100%;padding:5px 7px;color:#666;border:none;">
                                            <optgroup label="City">
                                                <option value="1" selected="">Dumaguete City</option>
                                                <option value="2">Bais City</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-shadow log_del" style="width:100%;">
                                <input type="text" name="phone" placeholder="Phone here.." style="width:100%;" autocomplete="off">
                            </div>
                            <div class="box-shadow log_del" style="width:100%;">
                                <input type="text" name="email" placeholder="Email" style="width:100%;" autocomplete="off">
                            </div>
                            <div class="box-shadow log_del" style="width:100%;">
                                <input type="password" name="password" placeholder="Password" style="width:100%;" class="main_pass" autocomplete="off">
                            </div>
                            <div class="box-shadow log_del" style="width:100%;position: relative;">
                                <div id="notif" style="position: absolute;top: 25px;display: none;">
                                  <span style="color: red;font-size: 12px;">Password do no match!!!</span>
                                </div>
                                <input type="password" name="confirm_password" placeholder="Confirm Password" style="width:100%;" class="confirm" autocomplete="off">
                            </div>
                            <button class="btn btn-primary s_n" type="submit" name="signup" style="border:medium none;color:rgb(255,255,255);font-size:13px;font-weight:700;text-transform:uppercase;transition:all .5s;padding:0 20px;height:35px;margin:15px;background-color:#ff7f00;font-weight:bold;cursor:pointer;margin-left:0px;margin-top:30px;">SIGNUP</button></div>
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