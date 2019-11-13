$(document).ready(function(){
/*Notif Interval*/
setInterval(function(){
   load_orders();
}, 500);

$('.notification').hover(function(){
	$.ajax({
		url:'inc/seen_order.php',
		success:function(d){
			notification();
		},
		error:function(err){
			console.log(err);
		}
	});
});

function load_orders(){
	$.ajax({
		url:'inc/fetch_order.php',
		dataType:'json',
		success:function(data){
			if (data.unseen > 0) {
				$('#badge').show();
				$('#badge').text(data.unseen);
				if (data.un_notified != 0) {
					notif_sound();
				}
			}else{
				$('#badge').hide();
			}
		},
		error:function(err){
			console.log(err);
		}
	});
}
function notif_sound(){
	var notif = new Audio('Assets/audio/notif.mp3');
	notif.play();
		$.ajax({
		url:'inc/notified.php',
		success:function(d){
			console.log(d);
		},
		error:function(err){
			console.log(err);
		}
	});
}

});
$(document).on('change','.uc',function(){
	var id_c = $(this).attr('id'); 
	var p_k = $('#r_id').val();//reservation ID
	var email = $('#u_fk_email_'+id_c).val();
	var name = $('#u_fk_name_'+id_c).val();
	var cell = $('#u_fk_cell_'+id_c).val();
	var option = $(this).val();//value of select
	// if (option == 1) {
		$.ajax({
			url:'inc/confirm_reservation.php',
			method:'POST',
			data:{
				id:id_c,
				p_k:p_k,
				email:email,
				option:option,
				name:name
			},
			beforeSend:function(){
				$('#gif').fadeIn(200);
			},
			success:function(data){
				setTimeout(function(){
					$('#gif').fadeOut(100);
					// redirecting the page into the link from data.url
					window.location.href = data;
					console.log(data.date);
					console.log(data.time);
				},300);
				send_sms(cell,id_c,name);
				console.log(data);
			},
			error:function(err){
				console.log(err)
			}
		});
		console.log(email);
		console.log(name);
		console.log(p_k);
		console.log(id_c);
	// }	
});
function send_sms(contact_num,id,name){
	$.ajax({
		url:'sms/send_sms.php',
		method:'POST',
		dataType:'json',
		data:{
			id:id,
			contact_num:contact_num,
			name:name
		},
		success:function(d){
			console.log(d);
		}
	});
}