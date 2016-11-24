$( document ).ready(function(){

    $(".dropdown-button").dropdown();

    $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $('.carousel').carousel();
    $('.carousel').carousel('next');
    $('.carousel').carousel('next', 3); // Move next n times.
    // Previous slide
    $('.carousel').carousel('prev');
    $('.carousel').carousel('prev', 4); // Move prev n times.
    // Set to nth slide
    $('.carousel').carousel('set', 4);


    $('ul.setting_menu').tabs();

    //custom tab sectioning for message view
    $('div.tabbed div').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('div.tabbed div').removeClass('active');
		$('.tab-content').removeClass('active');

		$(this).addClass('active');
		$("#"+tab_id).addClass('active');
	})

    $('#postStatus').characterCounter();

    //image cropping script

		var $uploadCrop;

		function readFile(input) {
 			if (input){
	            var reader = new FileReader();

	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	}).then(function(){
	            		console.log('jQuery bind complete');
	            	});

	            }

	            reader.readAsDataURL(input);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: 200,
				height: 200,
				type: 'circle'
			},
            boundary: {
                width: 300,
                height: 300
            },
			enableExif: true
		});

		$('#uploading').on('change', function () { readFile(this.files[0]); });
		$('.upload-result').on('click', function (ev) {
			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {
				popupResult({
					src: resp
				});
			});
		});



})
