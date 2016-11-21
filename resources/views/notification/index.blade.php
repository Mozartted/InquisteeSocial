@extends('layouts.default')
@section('content')
    <body>
        <div>
            @include('layouts.partials.nav')
            <div>
                <div class="row">
                    <div class="col s12 m3 hide-on-small-only">
                        <div class="card sections" style="overflow:hidden">
                            <div class="card-content">
                                <div class="col s12 center-align">
                                    <img src="images/profile/myAvatar.png" class="feed-img responsive-img circle">
                                </div>
                                <div class="col s12 center-align">
                                    <span class=""><small>@Mozartted</small></span>
                                    <span class=""><h6>Chibuike Emmanuel Osita</h6></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <ul class="collapsible " data-collapsible="accordion">
                                <li>
                                    <div class="collapsible-header truncate"><span class="new badge">19</span>Answered your relationship question</div>
                                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                                </li>
                                <li>
                                    <div class="collapsible-header truncate "><span class="new badge">19</span>Interested In You</div>
                                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                                </li>
                                <li>
                                    <div class="collapsible-header truncate"><span class="new badge">19</span>Following You</div>
                                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col s12 m5">

                        <div class="card sections min-margin">
                          <div class="col s12 nav-extended">
                              <ul class="tabs tabs-transparent">
                                  <li class="tab"><a  class="active" href="#notification">
                                      <span class="profile-menu-icon">
                                       Notifications
                                    </span></a>
                                </li>
                                  <li class="tab"><a href="#questions"><span class="profile-menu-icon">
                                      Questions
                                  </span></a></li>

                              </ul>
                          </div>
                        </div>

                          <div class="" id="notification">
                              <div class="card sections min-margin">
                                 <div class="card-content sections">
                                     <div class="col s12">
                                         <div class="col s12">
                                             <div class="col s12">
                                                 <a>
                                                     <span class="red-text" >
                                                         <b>@Mozartted </b>
                                                     </span>

                                                     <p><span class="color-span red-text">You have 14 new Followers</span></p>

                                                 </a>

                                             </div>
                                             <div class="col s12 images">
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="divider"></div>
                                 <div class="card-content sections">
                                     <div class="col s12">
                                         <div class="col s12">
                                             <div class="col s12">
                                                 <a  >
                                                     <span class="red-text" >
                                                         <b>@Mozartted </b>
                                                     </span>

                                                     <p><span class="color-span red-text">You have 14 new Followers</span></p>

                                                 </a>

                                             </div>
                                             <div class="col s12 images">
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                                 <div>
                                                     <a href="{!! url('/users/'.$feed->user->id) !!}"><img class="circle medium-avatar" src="images/profile/myAvatar.png" alt="{!! $feed->user->firstname !!}"></a>
                                                 </div>
                                             </div>

                                         </div>
                                     </div>

                                 </div>
                              </div>

                          </div>
                          <div class="" id="questions">
                              <div class="card sections min-margin">
                                  <div class="card-content sections">
                                      <div class="col s12">
                                          <p>What do you think is jane's relationship status</p>
                                      </div>
                                      <div class="col s12">
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test1" />
                                              <label for="test1">Single</label>
                                          </p>
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test2" />
                                              <label for="test2">Taken</label>
                                          </p>
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test3"  />
                                              <label for="test3">Not Sure</label>
                                          </p>
                                      </div>

                                  </div>
                                  <div class="divider"></div>
                                  <div class="card-content sections ">
                                      <div class="col s12">
                                          <p>What do you think is jane's relationship status</p>
                                      </div>
                                      <div class="col s12">
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test1" />
                                              <label for="test1">Single</label>
                                          </p>
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test2" />
                                              <label for="test2">Taken</label>
                                          </p>
                                          <p>
                                              <input class="with-gap" name="group1" type="radio" id="test3"  />
                                              <label for="test3">Not Sure</label>
                                          </p>
                                      </div>
                                  </div>


                              </div>

                      </div>

              </div>
              <div class="col s4 m3 hide-on-small-only">
                  <div class="card sections">
                      <div class="card-content">
                          <div id="right-side-column" class="col-md-3 row">
                              <div class="module roaming-module ">
                                  <div class="flex-module">
                                      <div class="big">
                                          <h6>Who to follow</h6>
                                      </div>
                                      <div class="content">
                                          <a class="account-group js-recommend-link js-user-profile-link user-thumb" href="https://twitter.com/XHNews">
                                              <img class="avatar js-action-profile-avatar " src="./(2) Twitter_files/8LB1WXsm_normal.jpeg" alt="">
                                              <span class="account-group-inner js-action-profile-name" data-user-id="487118986">
                                                  <b class="fullname">China Xinhua News</b>
                                                  <span class="Icon Icon--verified Icon--small"></span>
                                                  <span class="username"><s>@</s><span class="js-username">XHNews</span></span></span>
                                          </a>

                                          <small class="metadata social-context">
                                              Followed by <a class="pretty-link user-profile-link js-user-profile-link" data-user-id="599606014" href="https://twitter.com/CasaFeranza"><b>Casa Feranza</b></a> and <a href="https://twitter.com/XHNews/followers_you_follow" class="pretty-link u-textUserColor"><b>others</b></a>
                                          </small>

                                          <div class="user-actions not-following not-muting" data-screen-name="XHNews" data-user-id="487118986">
                                              <button type="button" class="small-follow-btn follow-btn btn small follow-button js-recommended-item">
                                                  <div class="js-action-follow follow-text action-text">
                                                      <span class="Icon Icon--follow"></span>
                                                      Follow
                                                  </div>
                                                  <div class="js-action-unfollow following-text action-text">Following</div>
                                                  <div class="js-action-unfollow unfollow-text action-text">Unfollow</div>
                                                  <div class="block-text action-text">Blocked</div>
                                                  <div class="js-action-unblock unblock-text action-text">Unblock</div>
                                                  <div class="js-action-unfollow pending-text action-text">Pending</div>
                                                  <div class="js-action-unfollow cancel-req-text action-text">Cancel</div>
                                              </button>
                                          </div>

                                      </div>



                                  </div>



                              </div>
                          </div>
                      </div>
                      </div>

                  </div>
              </div>


          </div>
      </div>
    </div>
    </body>
@endsection
