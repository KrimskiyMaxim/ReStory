$('#img_case').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } 
        } 
});
$("#img_case").change(function (e) {
	var url = window.URL || window.webkitURL;
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
			if(this.width >= this.height) {
				$('#user_logo span img').removeClass('user_logo_span_img_HbW');
				$('#user_logo span img').addClass('user_logo_span_img_WbH');
				$('#user_logo span').addClass('user_logo_span_WbH');
				
			} else {
				$('#user_logo span').removeClass('user_logo_span_WbH');
				$('#user_logo span img').removeClass('user_logo_span_img_WbH');
				$('#user_logo span img').addClass('user_logo_span_img_HbW');
			}
        };
        img.src = url.createObjectURL(file);
    }
});
$('#search-key').click(function() {
	var obj = $('#search').val();
	window.location = "search.php?source="+obj;
});
$('#enter').click(function() {
	$('#box-auth').fadeToggle();
});
