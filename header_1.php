<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web_dev II</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <!-- <link rel="stylesheet" href="assets/css/styles.min.css"> -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/search.css">
</head>

<body>
    <header>
        <div class="container-fluid" style="padding:0px;">
            <div class="row no-gutters">
                <div class="col">
                    <nav class="navbar navbar-light navbar-expand-md" style="background-color:#222;padding:2px 1px !important;">
                        <div class="container-fluid"><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-2">
                                <ul class="nav navbar-nav ml-auto head_nav_">
                                    <li class="nav-item" role="presentation"><a class="nav-link active" href="account.php"><i class="fa fa-user"></i></a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="wish_list.php"><i class="fa fa-heart"></i></a></li>
                                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php"><i class="fa fa-lock"></i></a></li>
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
                <div class="container-fluid"><a class="navbar-brand" href="index.html"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                       <!--  <ul class="nav navbar-nav justify-content-center mx-auto center-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Home</a></li> -->
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#">Elements</a></li> -->
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="product_items.php">Products</a></li> -->
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#">Pages</a></li> -->
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#">Blog</a></li> -->
                     <!--        <li class="nav-item" role="presentation"><a class="nav-link" href="about_us.php">About Us</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.php">Contact</a></li>
                        </ul> -->
                        <ul class="nav navbar-nav">
                          <div class="search-container">
                            <form action="/action_page.php">
                              <input type="text" placeholder="Search.." name="search">
                              <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                          </div>
                          <!--   <li class="nav-item" role="presentation"><a class="nav-link active" href="#"><i class="fa fa-search"></i></a></li>
 -->                            <li class="nav-item" role="presentation">
                                    <a class="nav-link cart" href="#"><i class="fa fa-cart-plus cart_order"></i>
                                        <ul class="list-unstyled drp_cart" style="position:absolute;width:400px;right:38px;background-color:#fff;border-radius:3px;margin-top:-7px;transition:all .5s ease-in-out;/*display:none;*/visibility:hidden;padding-top:35px;box-shadow:1px 7px 18px -4px #888;">
                                            <li class="drp_cart_head">Your cart</li>
                                            <li class="d-inline-block float-none d-lg-block">Item 4</li>
                                            <li class="drp_cart_head" style="font-weight:900;border-top:1px solid #888;">Total = $ 564.00</li>
                                            <li class="drp_cart_head">View Cart</li>
                                            <li class="drp_cart_head">Check out</li>
                                        </ul>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>

                    <div class="col-md-6">
                      <form class="navbar-form" role="search">
                        <div class="input-group add-on">
                          <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>