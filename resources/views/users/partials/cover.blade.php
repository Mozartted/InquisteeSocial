<div class="card-image cover-row" style="height:250px">
    @if(isset($profile['cover_pic']))
        <img class="status-img" src="{{asset($profile['cover_pic']->url)}}" style="height:inherit">
    @else
        <img class="status-img" src="" style="height:inherit">
    @endif

     <div class="card-title col s12 m6" style="">
          <div class="row">
              <div class="col s12 m7 center-align">
                  <div class="col s12 center-align">
                      @if(isset($profile['profile_pic']))
                          <img src="{{asset($profile['profile_pic']->url)}}" class="circle" style="height: 100px; width: 100px; border-radius:50%; margin:auto ">
                      @else
                          <img src="{{asset($profile['profile_pic']->url)}}" class="circle" style="height: 100px; width: 100px; border-radius:50%; margin:auto ">
                      @endif

                  </div>
                  <div class="col s12" style="margin-top: 24px;">
                      <div style="font-size:15px; margin:auto" class="red-text">
                          {{$profile['firstname'].' '.$profile['lastname']}}
                          <div class="divider"></div>

                          <span><small style="font-size:12px;">@ {{$profile['username']}}</small></span>
                      </div>

                  </div>
              </div>
          </div>

     </div>
</div>
