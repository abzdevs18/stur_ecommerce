$(document).ready(function(){
	feat();
	filter();
});


$('#prof_holder').on('change',function(){
	$('#update_now').submit();
});

$(document).on('click','.top_ar',function(){
	var n = "top_rated";
	$('.1').addClass('active_filter');
	$('.2').removeClass('active_filter');
	$('.3').removeClass('active_filter');
	$.ajax({
		url:'inc/product_list.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#product_list_f").html(d);
			// console.log(d);
		},
		error:function(s){
			console.log(s);
		}
	});
});
function feat(){
	var n = "top_rated";
	$('.1').addClass('active_filter');
	$('.2').removeClass('active_filter');
	$('.3').removeClass('active_filter');
	$.ajax({
		url:'inc/product_list.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#product_list_f").html(d);
			// console.log(d);
		},
		error:function(s){
			console.log(s);
		}
	});
}
$(document).on('click','.category_link',function(){
	var n = $(this).attr('id');
	$.ajax({
		url:'inc/db_function/category.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#fileterd_cat").html(d);
		},
		error:function(s){
			console.log(s);
		}
	});
});

$(document).on('change','#sort_',function(){
	var n = $(this).val();
	$.ajax({
		url:'inc/db_function/category.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#fileterd_cat").html(d);
			// console.log(d);
		},
		error:function(s){
			console.log(s);
		}
	});
});
function filter(){
	var n = 12;
	$.ajax({
		url:'inc/db_function/category.php',
		method:'POST',
		data:{
			query:n
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
$(document).on('click','.new_ar',function(){
	var n = "new_ar";
	$('.2').addClass('active_filter');
	$('.3').removeClass('active_filter');
	$('.1').removeClass('active_filter');
	$.ajax({
		url:'inc/product_list.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#product_list_f").html(d);
			// console.log(d);
		},
		error:function(s){
			console.log(s);
		}
	});
});
$(document).on('click','.best_ar',function(){
	var n = "best_ar";
	$('.3').addClass('active_filter');
	$('.2').removeClass('active_filter');
	$('.1').removeClass('active_filter');
	$.ajax({
		url:'inc/product_list.php',
		method:'POST',
		data:{
			query:n
		},
		success:function(d){
			$("#product_list_f").html(d);
			console.log(d);
		},
		error:function(s){
			console.log(s);
		}
	});
});
$(document).on('change','#amount',function(){
	var r = $(this).val();
	console.log(r);
});



/*EditingUpdating the billing info*/
$(document).on('submit','#pla_order_',function(e){
	e.preventDefault();
});

$(document).on('click','.edit-billing',function(){
	$('#pla_order_').submit(function(e){
		e.preventDefault();
	});
	$('#email_form').show();
});