$( document ).ready(function(){

    $('.modal').modal(

    );

    $('#searchh').autocomplete(
      {
        serviceUrl:'/ajax/search',
      }
    );

    $(".dropdown-button").dropdown(

        {
            inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0
        }
    );

    $('.datepicker').pickadate({
     selectMonths: true, // Creates a dropdown to control month
     selectYears: 15 // Creates a dropdown of 15 years to control year
    });

    $(".alert-danger").hide();
    $('select').material_select();

    $(".dropdown-button").dropdown({ hover: false });

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

	});

	$('.tab').click(function(){
		$(".alert-danger").hide().html().remove();
	});

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

		$uploadCrop = $('#upload-into').croppie({
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
				size: 'original'
			}).then(function (resp) {
                $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });

				$.ajax(
                    {
                    url: 'steps-register/pic',
    		        type: 'POST',
    		        data: {'image':resp},
                    dataType:'json',
    			    success: function (data) {
    				html = '<li>'+data.message+'</li>';
    				$(".alert-danger").html(html).show();
                    }
                });
			});

			//function that changes the tab to the next
		});


    $('#upload_details').on('click',function(){
          var details={
              about:$('#description').val(),
              location:$('#place').val()
          }
          $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax(
              {
              url: 'steps-register/details',
              type: 'POST',
              data: details,
              dataType:'json',
              success: function (data) {
                  html = '<li>'+data.message+'</li>';
                  $(".alert-danger").html(html).show();
              }
          });
      });

      //the click handler for follow button
      $('#follow').on('click',function(){
        //first step is to collect the username of the followed individual
        var username=$('#followIn').val();

        $.ajaxSetup(
          {
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
          }
        );

        if($(this).attr('data-follow-stat')=="follow"){
          $.ajax(
            {
              url:'ajax/follow',
              type:'POST',
              data:{
                Username:username
              },
              dataType:'json',
              success:function(data){
                if(data.message=="unfollow"){
                  var response=data.message;
                  $('#follow').html(response);
                  $('#follow').attr('data-follow-stat',response);
                }else{
                  html = '<li>'+'follower mechanism not functional'+'</li>';
                  $(".alert-danger").html(html).show();
                }
              },
              error:function(){
                html = '<li>'+'follower mechanism not functional'+'</li>';
                $(".alert-danger").html(html).show();
              }

            }

          );
        }else if($(this).attr('data-follow-stat')=="unfollow"){
          $.ajax(
            {
              url:'ajax/unfollow',
              type:'POST',
              data:{
                Username:username
              },
              dataType:'json',
              success:function(data){
                if(data.message=="follow"){
                  var response=data.message;
                  $('#follow').text(response);
                  $('#follow').attr('data-follow-stat',response);
                }else{
                  html = '<li>'+'follower mechanism not functional'+'</li>';
                  $(".alert-danger").html(html).show();
                }
              },
              error:function(){
                html = '<li>'+'follower mechanism not functional'+'</li>';
                $(".alert-danger").html(html).show();
              }

            }

          )
        }


      });

      $('.commend').click(function(){
        $('#commendMessage').val(' ');
        $('#status-commend').attr('data-id',$(this).attr('data-id'))//this is the status id
        $('#status-commend').attr('data-status',$(this).attr('data-status'));//if the status had already been commended
      });


      //function set to handle commending postStatus
      $('#status-commend').click(function(){
        var commendStatus=$(this).attr('data-status');
        var statusId=$(this).attr('data-id');
        var url='ajax/commend';
        var commendMessage=$('#commendMessage').val();

        if(commendStatus!=true){
          //if the status has not
          //been already commended
          //by the current username
          //make the commend via ajax
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax(
            {
              url:url,
              type:'POST',
              data:{
                status_id:statusId,
                message:commendMessage
              },
              dataType:'json',
              success:function(data){
                var html="<li>"+data.message+"</li>";
                $('#alert-notifier').html(html);
              },

              error:function(){
                var html="<li>Something went Wrong please try agin later</li>";
                $('#alert-notifier').html(html);
              }
            }

          )


        }
      });

})
