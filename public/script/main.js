$( document ).ready(function(){

  $body = $("body");

$(document).on({
  ajaxStart: function() { $body.addClass("loading");    },
   ajaxStop: function() { $body.removeClass("loading"); }
});

    $('.modal').modal(

    );

    // $('#searchh').autocomplete(
    //   {
    //     serviceUrl:'/ajax/search',
    //   }
    // );

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
				type: 'square'
			},
            boundary: {
                width: 300,
                height: 300
            },
			enableExif: true
		});

		$('#uploading').on('change', function () { readFile(this.files[0]); });
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
//updating cover pics
var $uploadCover;

function readFileCover(input) {
  if (input){
          var reader = new FileReader();

          reader.onload = function (e) {
      $('.upload-demo').addClass('ready');
            $uploadCover.croppie('bind', {
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

$uploadCover = $('#upload-cover').croppie({
  viewport: {
    width: 500,
    height: 300,
    type: 'square'
  },
        boundary: {
            width: 600,
            height: 350
        },
  enableExif: true
});

$('#uploadCoverInput').on('change', function () { readFileCover(this.files[0]); });
$('.upload-cover').on('click', function (ev) {
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
            });

    $.ajax(
                {
                url: 'steps-register/coverpic',
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

function InfiniteScrioll(element,data){
  $(element).jscroll(
    {
      loadingHtml:data
    }
  );
}


//Todo:loading commends to view..
function commendLoad(data)
{
  $('#loader').fadeOut('slow', function() {

    var data1=data;

    var feedsHTML = "";

    var commendPoint="";

    var message="",
      statusmedia="",
      stat_like="",
      authStat="",
      commendStat=''
      statususer='';


    $.each(data1.status, function(index, status){
        if ($('#feed'+status.id).length == 0)
        {
          for(var i=0; i< data1.commend.length; i++){
            if(data1.commend[i]['status_id']==status.id){
              //ie if the status is in commend list
              //send another ajax request to obtain the user with that id
              $.ajaxSetup({
                  headers: {
                       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                  }
              });

              $.ajax({
                url: "ajax/commenduser",
                data: { 'user' : data1.commend[i]['user_id'],'status_id':status.id},
                type:'POST',
                datatype:'json',
                async: false,
                success:function(data){
                  var data2=data;
                  commendPoint='<small><a href="'+data2.user.username+'">'+data2.user.name+'</a>commended this post</small>';
                  message='<div class="content" style="padding:5px;"><p class="status-text" style="color:#757575;">'+data1.commend[1]['commend']+'</p></div>';
                },
                error:function() {
                  return alert('something went wrong. Please try again.');
                }
              });
            }else{
              commendPoint="";
              message="";
            }

          }

          //send a request to  obtain status information
          $.ajaxSetup({
              headers: {
                   'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            url: "ajax/statusdetails",
            data: { 'status_id':status.id},
            type:'POST',
            datatype:'json',
            async:false,
            success:function(data){

              var data3=data;
              statusmedia=data3.status_media.url;
              stat_like=data3.stat_like;
              authStat=data3.authStat;
              statususer=data3.statususer;

              feedsHTML+=
              '<div class="card sections min-margin feed-object" id="feed'+status.id+'" style="margin-top: 10px"><div class="content" style="padding:5px;">'+commendPoint+'</div><div class="content" style="padding:5px;"><p class="status-text" style="color:#757575;">'+message+'</p></div><div class="card-image"><img class="status-img" src="'+statusmedia+'"></div><div class="card-content"><div class="margin-min-10"><p class="status-text" style="color:#757575;">'+status.status_text+'</p></div></div><div class="divider"></div><div class="card-content row" style="padding-left:2px;"><div class="col s12 row margin-min-10"><div class="col s2"><img src="'+statususer.profilepic.url+'" class="feed-img-status circle"></div><div class="col s10"><p class="username-text" style="color:#757575;">'+statususer.profile.id+statususer.profile.last_name+'</p><small><a href="'+statususer.user.username+'">'+statususer.user.username+'</a></small><small>'+$.timeago(status.created_at)+'</small></div></div></div><div class="card-action"><div class="col s12"><div class="col s5"></div><div class="col s7"><span id="statCount'+status.id+'">'+stat_like+'</span><div class="col s4 votedown love" data-stat-id="'+status.id+'" data-status="'+authStat+'"><i class="material-icons md-18">thumb_up</i></div><div class="col s4 commend" data-target="commend-section" data-id="'+status.id+'" data-status="'+commendStat+'"><i class="material-icons md-18">repeat</i></div></div></div></div></div>';

            },
            error:function() {
              return alert('something went wrong. Please try again.');
            }
          })

        }

    });

    $('.feedsection').append(feedsHTML);
    // InfiniteScrioll('.feedsection',feedsHTML);

  }); //Finish fading out loader

}


//infinite scroll features

	if($(location).attr('href') == "http://localhost:8000/")
	{

		$(window).scroll(function(){

			if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){

				var skipQty = $('.feed-object').length;

				if(skipQty <= 10)
				{
					skipQty = 10;
				}

				if(skipQty < $('.feedsection').attr('data-feedcount'))
				{

					$('#loader').fadeIn('slow', function() {
            $.ajaxSetup({
                headers: {
                     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });

						$.ajax({
							url: "ajax/feed",
							data: { 'skipQty' : skipQty},
              type:'POST',
              datatype:'json',
              async: false
						})
						.done(commendLoad)
						.fail(function() {
							return alert('something went wrong. Please try again.');
						});

					});	//Finish showing the loader

				}
			}//end scrolling
		});

	}//End Loading new feeds

})
