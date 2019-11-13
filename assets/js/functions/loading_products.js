$(document).ready(function(){
	load_items();
	loadcart();
});
function load_items(){
	$.ajax({
		url:'inc/fetch_products.php',
		method:'POST',
		success:function(data){
			$('.featured_prod').html(data);
		}
	});
}

$(document).on('mouseenter','.rating',function(){
	var index = $(this).data('index');
	var product_id = $(this).data('product_id');
	remove_rate_color(product_id);
	for(var count = 1; count <= index; count++){
		$('#'+product_id+'-'+count).css('color','#ff7f00');
	}
});

function remove_rate_color(product_id){
	for(var count = 1; count <= 5; count++){
		$('#'+product_id+'-'+count).css('color','#999');
	}	
}

$(document).on('click','.rating',function(){
	var index = $(this).data('index');
	var product_id = $(this).data('product_id');
	$.ajax({
		url:'inc/db_function/insert_rating.php',
		method:'POST',
		data:{
			rate:index,
			product:product_id
		},
		success:function(data){
			if (data == 'done') {
				load_items();
				window.location.href = 'product_preview.php?prodId='+product_id;
				// alert("Product has been rated");
			}else{
				alert("Problem in rating the product");
			}
		}
	});
});

$(document).on('mouseleave','.rating',function(){
	var index = $(this).data('index');
	var product_id = $(this).data('product_id');
	var rating = $(this).data('rating');
	remove_rate_color(product_id);
	for(var count = 1; count <= rating; count++){
		$('#'+product_id+'-'+count).css('color','#ff7f00');
	}
});

$(document).on('click','#ko_',function(){
	var menu_id = $(this).attr('class');
	var quan_add = $('.ki_d_'+menu_id).val();
	quan_add++;
	$('.ki_d_'+menu_id).val(quan_add);	
});

$(document).on('click','#ko_d',function(){
	var menu_id = $(this).attr('class');
	var quan_add = $('.ki_d_'+menu_id).val();
	if (quan_add != 1) {
		quan_add--;
		$('.ki_d_'+menu_id).val(quan_add);	
	}else{
		quan_add = 1;
		$('.ki_d_'+menu_id).val(quan_add);	

	}
})


$(document).on('click','#kop',function(){
	var cart_id = $(this).attr('class'); //row in DB
	var quantity_field = $('.ki_d_'+cart_id).val(); //quantity value
	var c_id_ = $('#p_id_').val();  //customer id
	var action = "increase";
	quantity_field++;
	$('.ki_d_'+cart_id).val(quantity_field);
	$.ajax({
		url:'inc/session_increase.php',
		method:'POST',
		data:{
			cart_id:cart_id,
			quantity:quantity_field,
			customer_id:c_id_,
			action:action
		},
		success:function(e){
			// console.log(e);
			loadcart();
		}
	});
});

/*Subtracting quantity*/
$(document).on('click','#pl_d_',function(){
	var cart_id = $(this).attr('class');
	var quantity_field = $('.ki_d_'+cart_id).val();
	var c_id_ = $('#p_id_').val();  //customer id
	var action = "decrease";
	if (quantity_field != 1) {
		quantity_field--;
		$('.ki_d_'+cart_id).val(quantity_field);	
	}else{
		quantity_field = 1;
		$('.ki_d_'+cart_id).val(quantity_field);	

	}
	$('.ki_d_'+cart_id).val(quantity_field);
	$.ajax({
		url:'inc/session_increase.php',
		method:'POST',
		data:{
			cart_id:cart_id,
			quantity:quantity_field,
			customer_id:c_id_,
			action:action
		},
		success:function(d){
			loadcart();
			console.log(d);
		},
		error:function(e){
			console.log(e);
		}
	});
});

function loadcart(){
	$.ajax({
		url:'inc/cart_items.php',
		method:'POST',
		success:function(data){
			$('.items_in_cart').html(data);
		}
	});
}


/*Contact Us*/

$(document).ready(function(){
	$('#cntact_msg').submit(function(e){
		e.preventDefault();
	});
	$('.cntact_msg').click(function(){
		var data = $('#msg_cont form').serialize();
		console.log(data);
	});
});