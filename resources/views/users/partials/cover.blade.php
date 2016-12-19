
<div class="card sections" style="width:100%">
    <div class="card-image cover-row" style="height:300px">
        @if(isset($profile['cover_pic']))
            <img class="status-img" src="{{asset($profile['cover_pic']->url)}}" style="height:inherit; object-fit: cover;">
        @else
            <img class="status-img" src="images/cover/cover.jpg" style="height:inherit; object-fit: cover;">
        @endif

         <div class="card-title col s12 m6" style="">
              <div class="row">
                  <div class="col s12 m7 center-align">
                      <div class="col s12 center-align">
                          @if(isset($profile['profile_pic']))
                              <img src="{{asset($profile['profile_pic']->url)}}" class="circle" style="height: 100px; width: 100px; border-radius:50%; margin:auto ">
                          @else
                              <img src="images/profileimages/icon-user-default.png" class="circle" style="height: 100px; width: 100px; border-radius:50%; margin:auto ">
                          @endif

                      </div>
                      <div class="col s12" style="margin-top: 24px;">
                          <div style="font-size:15px; margin:auto" class="white-text">
                              {{$profile['firstname'].' '.$profile['lastname']}}
                              <div class="divider"></div>

                              <span><small style="font-size:12px;">@ {{$profile['username']}}</small></span>
                          </div>

                      </div>
                      @if (Auth::user()->username==$profile['username'])
                          <div class="col s12">
                                  <div class="btn red" data-target="edit">
                                      <span class="profile-menu-icon white-text">
                                          Edit Profile
                                      </span>
                                  </div>
                          </div>
                      @else
                          <div class="col s12">
                            <meta name="csrf-token" content="{{ csrf_token()}}">
                              @if($interested==true)
                                <div class="col s6 btn red white-text font-pattern2 truncate" id="interested" data-interest-stat="uninterested">
                                    uninterested
                                </div>
                                <input id="interestedIn" type="hidden" value="{{$profile['username']}}">
                              @else
                                <div class="col s6 btn red white-text font-pattern2 truncate" id="interested" data-follow-stat="interested">
                                    interested
                                </div>
                                <input id="interestedIn" type="hidden" value="{{$profile['username']}}">
                              @endif

                              @if ($followed==true)
                                <div class="truncate col s6 btn blue white-text font-pattern2" id="follow" data-follow-stat="unfollow">
                                    unfollow
                                </div>
                                <input id="followIn" type="hidden" value="{{$profile['username']}}">
                              @else
                                <div class="truncate col s6 btn blue white-text font-pattern2" id="follow" data-follow-stat="follow">
                                    follow
                                </div>
                                <input id="followIn" type="hidden" value="{{$profile['username']}}">
                              @endif

                          </div>

                      @endif

                  </div>
              </div>

         </div>

    </div>
    <div class="card-action" style="overflow:hidden; padding:0px">
        <div class="col s12 nav-extended">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a  class="active" href="#test1">
                    <span class="profile-menu-icon">
                    Timeline
                  </span></a>
              </li>
                <li class="tab"><a href="#test2"><span class="profile-menu-icon">
                     About
                </span></a></li>
                <li class="tab"><a href="#test3"><span class="profile-menu-icon">
                     Followers
                </span></a></li>
                <li class="tab"><a href="#test4"><span class="profile-menu-icon">
                    Following
                </span></a></li>
                <li class="tab"><a href="#test4"><span class="profile-menu-icon">
                    More
                </span></a></li>
            </ul>
        </div>
    </div>
</div>
