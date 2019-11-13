   <div id="slider"></div>

   <section style="box-sizing:border-box;">
        <footer>
            <div class="row">
                <div class="col-sm-6 col-md-4 footer-navigation">
                    <h3><a href="index.php"><img src="assets/img/logo.png" style="
                    width: 25%;"></a></h3>
                    <p class="links">
                        <a href="index.php">Home</a><strong> · </strong>
                        <a href="about_us.php">About</a><strong> · </strong>
                        <a href="contact-us.php">Contact</a><strong> · </strong>
                        <a href="account.php">Account</a>
                    </p>
                    <p class="company-name">Company Name © <?php echo Date('Y');?> </p>
                </div>
                <div class="col-sm-6 col-md-4 footer-contacts">
                    <div><span class="fas fa-map-marker-alt footer-contacts-icon"> </span>
                        <p><span class="new-line-span">PTV10 Street Capitol Area</span> Dumaguete Philippines</p>
                    </div>
                    <div><i class="fa fa-phone footer-contacts-icon"></i>
                        <p class="footer-center-info email text-left"> +63936-275-8967</p>
                    </div>
                    <div><i class="fa fa-envelope footer-contacts-icon"></i>
                        <p> <a href="contact-us.php" target="_blank">stur_shop@gmail.com</a></p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 footer-about">
                    <h4>About the company</h4>
                    <p> Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet. </p>
                    <div class="social-links social-icons">
                        <a href="https://www.facebook.com/clint.distro" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/zeref_abz" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/in/abz-devz/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/abzdevs18" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <script src="assets/js/functions/main_function.js"></script>
    <script src="assets/js/functions/loading_products.js"></script>
    <script src="assets/js/functions/prof.js"></script>
    <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 100000,
      values: [ 75, 300 ],
      stop:main, //event when user stop drag the ball
      slide: function( event, ui ) {
        $( "#amount" ).val( "P" + ui.values[ 0 ] + " - P" + ui.values[ 1 ] );
      }
    });
    function main(){
        var min = $( "#slider-range" ).slider( "values", 0 );
        var max = $( "#slider-range" ).slider( "values", 1 );
        gen_range(min,max);
    }
    $( "#amount" ).val( "P" + $( "#slider-range" ).slider( "values", 0 ) +
      " - P" + $( "#slider-range" ).slider( "values", 1 ) );
    });

    function gen_range(min,max){
        $.ajax({
            url:'inc/db_function/category.php',
            method:'POST',
            data:{
                query:"range",
                min:min,
                max:max
            },
            success:function(d){
                $("#fileterd_cat").html(d);
                // console.log(d);
            },
            error:function(s){
                console.log(s);
            }
        });
    }


    $(document).on("mouseout",'.confirm',function(){
        var main_pass = $('.main_pass').val();
        var n = $(this).val();
        if (n != main_pass) {
          $('#notif').show();
        }else{
          $('#notif').hide();

        }
    });
    </script>
</body>
</html>
