<?php
    session_start();
    error_reporting(0);
    include 'inc/conn.php';
    include 'inc/db_function/data_function.php';
    $c_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web_dev II</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/fa/css/all.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui-theme.css">
    <link rel="stylesheet" href="assets/fonts/cookie.css">
    <link rel="stylesheet" href="assets/fonts/railway.css">
    <link rel="stylesheet" href="assets/fonts/roboto.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include 'modals.php'; ?>
    <header>
        <div class="container-fluid" style="padding:0px;">
            <div class="row no-gutters">
                <div class="col">
                    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#222;padding:2px 1px !important;">
                        <div class="container-fluid"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-2">
                                <ul class="nav navbar-nav ml-auto head_nav_">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active acc_link account_icon" href="account.php">
                                            <i class="fa fa-user"></i>
                                            <span class="i_text">My Account</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link acc_link" href="wish_list.php">
                                            <i class="fa fa-heart"></i>
                                            <span class="i_text">Wislist(1)</span>
                                        </a>
                                    </li>
                                    <?php
                                    if (isset($c_id)) {?>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link acc_link" href="inc/log.php">
                                                <i class="fas fa-lock-open"></i>
                                                <span class="i_text">Logout</span>
                                            </a>
                                        </li>
                                    <?php
                                    }else{?>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link acc_link" href="login.php">
                                                <i class="fa fa-lock"></i>
                                                <span class="i_text">Login</span>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section style="position:sticky;top:0;z-index:999;background-color:#fff;box-shadow:1px 1px 8px #999;">
        <div class="container-fluid" style="padding:0px;">
            <nav class="navbar navbar-light navbar-expand-md">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse col-md-10"
                        id="navcol-1">
                    <ul class="nav navbar-nav col-md-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                  <form class="navbar-form" role="search" style="box-shadow:0px 1px 4px 0px #999 !important;border-radius: 20px;position: relative;transition: all .3s;" autocomplete="on">
                                    <div class="input-group add-on" style="z-index: 2;">
                                      <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text" autocomplete="off">
                                      <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                      </div>
                                    </div>
                                    <div id="result" style="width: 100%;background-color: #fff;top: 0px;position: absolute;display: none;">
                                        <div style="margin-top: 45px;" id="result_p">
                                            <!-- <a href="#" style="font-size: 18px;"><p style="padding-left: 10px;" class="link_result">Hello</p></a> -->
                                        </div>
                                    </div>
                                  </form>
                                </div> 
                                <div class="col-md-4">    
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link cart" href="cart_items.php" style="position: absolute;padding: 0px !important;">
                                            <i class="fa fa-cart-plus cart_order" style="font-size: 30px;padding: 0px;position: absolute;margin: 5px;left: -25px;"></i>
                                            <span style="display:none;padding: 4px;font-size: 13px;color: #888;" id="action_notif"></span>
                                            <span class="badge badge-pill badge-warning" style="color: rgb(85, 85, 85); z-index: 999; margin: -14px; position: relative; top: -5px;left: 15px;display: none;">0</span>
<!--                                             <ul class="list-unstyled drp_cart" style="width:400px;right:38px;background-color:#fff;border-radius:3px;margin-top:-7px;transition:all .5s ease-in-out;/*display:none;*/visibility:hidden;padding-top:35px;box-shadow:1px 7px 18px -4px #888;">
                                                <li class="drp_cart_head">Your cart</li>
                                                <li class="d-inline-block float-none d-lg-block">Item 4</li>
                                                <li class="drp_cart_head" style="font-weight:900;border-top:1px solid #888;">Total = $ 564.00</li>
                                                <li class="drp_cart_head">View Cart</li>
                                                <li class="drp_cart_head">Check out</li>
                                            </ul> -->
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
<!--     <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb" style="background:none !important;padding-bottom: 0px;">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                  <hr>
                </nav>
            </div>
        </div>
    </div> -->
