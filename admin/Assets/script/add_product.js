$(document).ready(function(){
	$('#add_prod').click(function(e){
		e.preventDefault();
		// var data = '';
		var photo_data = $('#image').prop('files')[0];
		var title = $('#title').val();
		var description = $('#description').val();
		var price = $('#price').val();
		var people = $('#people').val();
		var status = $('#status').val();
		// var quantity = [];
		// var s = $('#quantity').name('quantity')[0];
		// $(s).each(function(){
		// 	quantity.push(this.value)
		// });
		var quantity = $('input:hidden.quantity').serialize();
		var product_name = $('input:hidden.product_name').serialize();
		// var product = $('#product').val();

		var fd =  new FormData();
		fd.append('title',title);
		fd.append('description',description);
		fd.append('price',price);
		fd.append('people',people);
		fd.append('status',status);
		fd.append('quantity',quantity);
		fd.append('product_name',product_name);
		fd.append('package_photo',photo_data);
		$.ajax({
			url:'inc/actions/package_add.php',
			method:'POST',
			dataType:'json',
			traditional: true,
		    processData: false, // important
		    contentType: false, // important
			data:fd,
			success:function(data){
				window.location.href = data.url;
				console.log(data);
			},
			error:function(err){
				console.log(err);
			}
		});
	});


 $('#package_holder').submit(function(e){
 	e.preventDefault();

 	// $(this).unbind('submit').submit();
 	// console.log($(this).serialize());
 });
 var product_name = '';
 var product = '';
 var count = 0;
 $('#product').change(function(){
		product = $(this).val();
		product_name = $(this).find('option:selected').text();
 });

$(document).on('click','#ded',function(){
	var quantity = $('#quantity').val();
	var item = '';
	if ($('#quantity').val() == '' || $('#quantity').val() == 0) {
		$('#error_qunatity').show();
	} else {
		item += "<tr class='sdw' id='row_"+product+"'>";
	 	item +='<td style="border-right: 1px solid #cfdbe2;"><input type="hidden" value="'+quantity+'" class="quantity" name="quantity[]">'+quantity+'</td>';
	 	item +='<td style="border-right: 1px solid #cfdbe2;"><input type="hidden" value="'+product+'" class="product_name" name="product_name[]">'+product_name+'</td>';
	 	item +='<td style="border-right: 1px solid #cfdbe2;"><button id="'+product+'" class="remove_details">Remove</button></td>';
	 	item += '</tr>';
	 	$('#ta').show();
 		$('#d').append(item); 
 		count++;		
 		// data = $('.sdw td').serialize();	
 	}
 	$('#quantity').change(function(){
		$('#error_qunatity').hide();
 	});
 });
$(document).on('click','.remove_details',function(){
	var id = $(this).attr('id');
	if (confirm('Remove this Item?')) {
		$("#row_"+id+"").remove();
	}else {
		return false;
	}
});
});