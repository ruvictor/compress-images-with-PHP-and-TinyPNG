function upload_img(){

	if(!window.FileReader) {
        alert("The file API isn't supported on this browser yet.");
        return;
    }
	
	input = document.getElementById('file');
	if (!input) {
        alert("Um, couldn't find the fileinput element.");
    }
    else if (!input.files) {
        alert("This browser doesn't seem to support the `files` property of file inputs.");
    }else{
		var result_div = $('.upload_alert');
		form_data = new FormData($('#add_form')[0]);
		$.ajax({
			url: '/ajax/tiny.php',
			type: 'POST',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
			beforeSend: function() {
				result_div.fadeOut();
				result_div.fadeIn();
				result_div.html('Loading...');
			},
			success: function(data) {
				result_div.html(data);
				input.value = input.defaultValue;
			},
			error: function(e) {
				console.log(e);
			}
		});
    }
}