$(document).ready(function(){
	$('#adminP').click(function(){
		var content =$('#content').val();
		// var progress = $('#progress');
		var photo_data;
		var video_data;
		/*FormData for upload a file using jquery without using form*/
         var fd = new FormData();
        /*You can add attributes here to send to the url*/	
        fd.append('content',content);

		if ($('.upload-video').val() && $('.upload-photo').val() == '') {
			var type="video";
        	video_data = $('#vidUp').prop('files')[0];
        	fd.append('admin_video',video_data);	
        	fd.append('file_type',type);

		}else if ($('.upload-photo').val() && $('.upload-video').val() == '' ) {
			var type="image";
        	photo_data = $('#pUpload').prop('files')[0];
        	fd.append('admin_photo',photo_data);	
        	fd.append('file_type',type);
		}
		$.ajax({
			url:'inc/adminUpload.php',
			type:'POST',
		    processData: false, // important
		    contentType: false, // important
			data:fd,
			beforeSend:function(){
				$('#progress').show();
			},
			success:function(data){
				fd.delete('admin_photo');
				// alert("Success Upload");
    			$("#pUpload").attr('src',''); 
			    $('.upload-form').hide();
			    $('.background-upload').hide();

			},
			error:function(err){
				console.log(err);
			}
		});
	});
});