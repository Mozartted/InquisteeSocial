<div class="card sections min-margin">
   <div>
       @foreach ($variable as $key => $value)
           <div class="col s12">
               <div class="col s12 row margin-min-10">
                   <div class="col s2">
                       <img src="images/profile/myAvatar.png" class="feed-img-status circle">
                   </div>
                   <div class="col s10">
                       <p class="username-text" style="color:#757575;">Chibuike Osita</p>
                       <small>@mozartted</small>
                       <small> - 3mins ago</small>
                   </div>
               </div>
           </div>
           <div class="divider"></div>
       @endforeach

   </div>
</div>
