
   <div class="col s12 ">
       @if (isset($profile))
           @foreach ($profile as $pro)
               <div class="col s12" style="min-height:72px">
                   <div class="col s12 row margin-min-10 ">
                       <div class="col s2">
                           <img src="{{asset($pro->profileMedia->url)}}" class="feed-img-status circle">
                       </div>
                       <div class="col s10">
                           <p class="username-text" style="color:#757575;">Chibuike Osita</p>
                           <a href="{{url($pro->user->username)}}"><small>{{'@'.$pro->user->username }}</small></a>

                       </div>
                   </div>
               </div>

           @endforeach
       @endif
   </div>
