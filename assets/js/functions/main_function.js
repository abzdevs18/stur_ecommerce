$(document).ready(function(){
	load_cart_items();
});

$(document).on('click','.order',function(){
	var menu_id = $(this).attr('id');
	$.ajax({
		url:'inc/check_e_status.php',
		success:function(id){
			if (id == "online") {
				add_cart(menu_id);
				// wish_list_add_cart(menu_id);
			}else{
				window.location.href = 'login.php';
			}
		},
		error:function(err){
			console.log(err);
		}
	});
});

$(document).on('click','.cart_',function(e){
	e.preventDefault();
});
function add_cart(id){
	var c_id = $('#cus_id').val();
	var res = $('#prod_quan').val();
	var action = "add";
	if (res < 1) {
		notif.text('Quantity is invalid');
		notif.css('color','red');
		notif.fadeIn(100).delay(3000).fadeOut(100);
	}else{
		$.ajax({
			url:'inc/db_function/add_cart.php',
			method:"POST",
			data:{
				id:id,
				customer_id:c_id,
				quantity:res,
				action:action
			},
			success:function(data){
				load_cart_items();
				console.log(data);
				notif.text('Added to cart');
				notif.css('color','#777');
				notif.fadeIn(100).delay(3000).fadeOut(100);
			},
			error:function(err){
				console.log(err);
			}
		});
	}
}

function wish_list_add_cart(id){
	var c_id = $('#cus_id').val();
	var res = $('#prod_quan').val();
	var action = "add";
	if (res < 1) {
		notif.text('Quantity is invalid');
		notif.css('color','red');
		notif.fadeIn(100).delay(3000).fadeOut(100);
	}else{
		$.ajax({
			url:'inc/db_function/add_cart.php',
			method:"POST",
			// dataType:'json',
			data:{
				id:id,
				customer_id:c_id,
				quantity:res,
				action:action
			},
			success:function(data){
				if (data == 'transfered') {
					window.location.href = 'cart_items.php';
				}
			},
			error:function(err){
				console.log(err);
			}
		});
	}
}
$(document).on('click','#buy_this',function(){
	var productID = $(this).data('productid');
	var customerID = $(this).data('customerid');
	var product_quantity_ = $('#quan_prod').val();
	var action = "add";

	if (product_quantity_ < 1) {
		notif.text('Quantity is invalid');
		notif.css('color','red');
		notif.fadeIn(100).delay(3000).fadeOut(100);
	}else{
		$.ajax({
			url:'inc/db_function/add_cart.php',
			method:"POST",
			data:{
				id:productID,
				customer_id:customerID,
				quantity:product_quantity_,
				action:action
			},
			success:function(data){
				load_cart_items();
				window.location.href = 'cart_items.php';
			},
			error:function(err){
				console.log(err);
			}
		});
	}
	// console.log(product_quantity_);
});

$(document).on('click','#wish_list',function(){
	var productID = $(this).data('productid');
	var customerID = $(this).data('customerid');
	var action = "add";


	$.ajax({
		url:'inc/db_function/add_wishlist.php',
		method:"POST",
		data:{
			id:productID,
			customer_id:customerID,
			action:action
		},
		success:function(data){
			if (data=='exist') {
				alert('Item added to wishlist already.');
			}else{
				load_cart_items();
				window.location.href = 'wish_list.php';
			}
		},
		error:function(err){
			console.log(err);
		}
	});
});


function load_cart_items(){
	$.ajax({
		url:'inc/db_function/fetch_data.php',
		method:'POST',
		dataType: 'json',
		success: function(data){
			$('#package-item-c').html(data.details);
				$('.c_itm').text(data.item_number);
			if (data.item_number > 0) {
				$('.badge').show();
				$('.badge').text(data.item_number);
				$('#p_tot').text(data.total_price);
				console.log("jhg"+data.item_number);

			}else{
				$('.badge').hide();
			}
			console.log("items:"+data.item_number);
			console.log("v:"+data.c_id);
		},
		error:function(d){
			console.log(d);
		}
	});
}
$(document).on('click','.m_c',function(){
	$('#remove_item_n').addClass('hide');
});

/*Removing Items in cart*/
$(document).on('click','.remove_cart',function(){
	var p_cart_id = $(this).attr('id');
	var prod_id = $(this).data('product');
	var customerid = $(this).data('customer')

	$('#remove_item_n').addClass('show_c');
	$('#remove_item_n').removeClass('hide');
	// $('#remove_item_n').css('display','block');

	$('#cart_id').val(p_cart_id);
	$('#prod_pk').val(prod_id);
	$('#customer_id').val(customerid);
});

$(document).on('click','.rem',function(){
	var cart_id = $('#cart_id').val();
	var prod_pk = $('#prod_pk').val();
	var customer_id = $('#customer_id').val();
	var action = "remove_p";
		$.ajax({
			url:"inc/db_function/add_cart.php",
			method:"POST",
			data:{
				id:cart_id,
				prod_pk:prod_pk,
				customer_id:customer_id,
				action:action
			},success:function(){
				load_cart_items();
				window.location.href = 'cart_items.php';
			}
		});		
});

function cancel(){
	$('#remove_item_n').addClass('hide');
	$('#remove_item_n').css('display','none');	
}

/*Removing Items in cart*/
$(document).on('click','.remove_wish',function(){
	var prd_id = $(this).attr('id');
	var action = "remove_wishlist";
	if (confirm("Remove this item?")) {
		$.ajax({
			url:"inc/db_function/add_cart.php",
			method:"POST",
			data:{
				id:prd_id,
				action:action
			},success:function(){
				window.location.href = 'wish_list.php';
			}
		});
	}
});

$('.cod_trig').click(function(e){
	$('.cod_op').show();
});
$('#pla_order_').click(function(e){
	e.preventDefault();
	window.location.href = 'payment_method.php';
});
$('.place_btn').click(function(e){
	e.preventDefault();
	/*Here order */
	$
	window.location.href = 'order_details.php';
});
$(document).on('click','.brand_',function(){
	var productid =  $(this).attr('id');
	window.location.href = 'product_items.php?brand='+productid;
});
$(document).on('click','.receP_',function(){
	var rece_p =  $(this).attr('id');
	window.location.href = 'product_preview.php?prodId='+rece_p;
});

/*Searching effects*/
/**/
$(document).on('keyup','#srch-term',function(){
	var term  = $(this).val();
	console.log(term.length);
	if (term.length == 0) {
		$('#result').hide();
		$('.add-on').css('box-shadow','0px 1px 4px 0px #999');
		// $('.add-on').css('border','1px solid #888 !important');
	}else{
		$('.navbar-form').css('border','none');
		$('.add-on').css('box-shadow','0px 1px 4px 0px #999');
		$('#result').show();
		$('#result').addClass('onKeyUp');
	}

		$.ajax({
			url:"inc/db_function/search_product.php",
			method:"POST",
			data:{
				product:term
			},success:function(d){
				$('#result_p').html(d);
				// console.log(d);
			}
		});
});

