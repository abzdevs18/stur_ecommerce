
  </main>
<script src="Assets/script/morris/raphael-min.js"></script>
<script src="Assets/script/morris/morris.min.js"></script>
<script src="Assets/slick/slick.min.js"></script>
<!-- animsition.js -->
<script src="Assets/script/animsition.min.js"></script>
<script src="Assets/script/chart.min.js"></script>
<script src="Assets/script/design.js"></script>
<script src="Assets/script/morris-chart.js"></script>
<script src="Assets/script/adminUp.js"></script>
<script src="Assets/script/menuActions.js"></script>
<script src="Assets/script/header.js"></script>
<script src="Assets/script/main_function.js"></script>
<script src="Assets/script/add_product.js"></script>
<script>
    $(document).ready(function(){
      $('.feature-item-slide').slick({
      	dots: true,
    		infinite: true,
    		speed: 300,
    		slidesToShow: 1,
    		autoplay:true,
    		autoplaySpeed:2000
      });	

      function profileImg(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#profileImageContainer').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#updateAd").change(function() {
        $('#update_admin_prof').submit();
        profileImg(this);
        console.log("sibn Change");
      });
      $("#updateAd").click(function(){
        console.log('kdiuh');
      });
      $('.nav-wrapper').click(function(){
        console.log('jijh');
      });
    });

// new Morris.Bar({
//   element: 'user-growth',
//   xkey: 'y',
//   ykeys: ['Employed', 'Unemployed'],
//   labels: ['Employed', 'Unemployed']
// });

// new Morris.Line({
//   element: 'myChart',
//   xkey: 'month',
//   ykeys: ['value'],
//   labels: ['month'],
//   parseTime: false
// });

  </script>
</body>
</html>
