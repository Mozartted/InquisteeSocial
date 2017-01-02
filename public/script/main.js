$( document ).ready(function(){

    //registering event monitors and body functions.
    $body = $("body");

    $(document).on(
      {
        ajaxStart: function() { $body.addClass("loading"); },
        ajaxStop: function() { $body.removeClass("loading"); }
      }
    );

    $('.modal').modal();

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
    ////////////////////////////////////////////////////////
    //File reader
    function readFile(input,class) {
 			if (input){
	            var reader = new FileReader();

	            reader.onload = function (e) {
					$('.upload-demo').addClass('ready');
                //binds the image to definded croppie section
	            	class.croppie('bind', {
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

  ///////////////////////////////////////////////////////////


    //image cropping script
		var $uploadCrop;

		$uploadCrop = $('#upload-into').croppie({
			viewport: {
				width: 200,
				height: 200,
				type: 'square'
			},
            boundary: {
                width: 300,
                height: 300
            },
			enableExif: true
		});

    var $uploadCover;

    $uploadCover = $('#upload-cover').croppie(
      {
      viewport:
      {
        width: 500,
        height: 300,
        type: 'square'
      },
      boundary:
      {
          width: 600,
          height: 350
      },
      enableExif: true
      }
    );

    var $uploadMessageImage;

    $uploadMessageImage=$('#messageView').croppie(
      {
        viewport:
        {
          width:0,
          height:0,
          type:'square'
        },

        boundary:
        {
          width:50,
          height:50,
        },
        enableExif:true
      }
    );

		$('#uploading').on('change', function () { readFile(this.files[0],$uploadCrop); });
		$('.upload-result').on('click', function (ev) {
      ev.preventDefault();
      ev.stopPropagation();

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
		});

    $('#messageUpload').on('change', function () { readFile(this.files[0],$uploadMessageImage); });
		$('#messageUploaded').on('click', function (ev) {
      ev.preventDefault();
      ev.stopPropagation();

			$uploadMessageImage.croppie('result', {
				type: 'canvas',
				size: 'original'
			}).then(function (resp) {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  }
                });

				        $.ajax({
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
		});

    //updating cover pic
    $('#uploadCoverInput').on('change', function () { readFileCover(this.files[0],$uploadCover); });
    $('.upload-cover').on('click', function (ev)
    {
      ev.preventDefault();
      ev.stopPropagation();
      $uploadCover.croppie('result', {
        type: 'canvas',
        size: 'original'
      }).then(function (resp) {
          $.ajaxSetup({
            headers: {
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        }
      );
      $.ajax(
        {
          url: 'steps-register/coverpic',
          type: 'POST',
          data: {'image':resp},
          dataType:'json',
          success: function (data)
          {
            html = '<li>'+data.message+'</li>';
            $(".alert-danger").html(html).show();
          }
        }
      );
    });
      //function that changes the tab to the next
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

      $('#completed').click(function(){
          if($(this).attr('data-func-status')=="complete"){
            window.location.replace("/");
          }else if($(this).attr('data-func-status')=="next"){
            $('div.tabbed div').removeClass('active');
            $('#profile-tab').addClass('active');

            $('.tab-content').removeClass('active');
            $('#profile').addClass('active');

            var html='<i class="material-icons">send</i>Complete';
            $(this).html(html);
            $(this).attr('data-func-status','complete');
          }
      });


      $('#upload_details').click(function(e){
        e.preventDefault();
        e.stopPropagation();

            var details={
                about:$('#description').val(),
                school:$('#place').val(),
                admission:{
                    admissionday:$('#adday').val(),
                    admissionmonth:$('#admonth').val(),
                    admissionyear:$('#adyear').val()
                },
                graduation:{
                    graduationday:$('#gdday').val(),
                    graduationmonth:$('#gdmonth').val(),
                    graduationyear:$('#gdyear').val()
                }
            };

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


//profile edit systems and functionalities
$('.love').click(function(){
  //on clicking the element, the data-status-id is collected and
  //an ajax request is sent to perfoem operations, and the result is
  //handled using the systems
  element=this;
  var statusId=element.dataset.statId;
  var state=element.dataset.status;

  //setup the user information checks
  $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
  });
  //if the user has not already loved post, perform love
  if(state=='false'){
    var details={
      status:statusId
    };

    $.ajax({
      url:'ajax/status/love',
      type:'POST',
      data:details,
      dataType:'json',
      success:function(data){
        if(data.userLove){
          element.dataset.status='true'
        }
        console.log(data.userLove);
        console.log(data.loveCount)
        var html=data.loveCount;

        $("#statCount"+statusId).text(html);
      },
      error:function(){
        console.log("Error called" );

      }

    });
  }
});

  $('.feeds-display').jscroll(
    {
      loadingHtml:'<img src="loading.gif" alt="Loading" /> Loading...',
      nextSelector:'a.jscroll-next:last',
      contentSelector: '.feeds-display'
    });
});
