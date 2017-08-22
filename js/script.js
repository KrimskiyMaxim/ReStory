$('#img_case').change(function () {
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
				var image = $('#preview').width();
					alert(image);
            } 
        }
});
$('#enter').click(function() {
	$('#box-auth').fadeToggle();
});
