@extends('layouts.default')
@section('content')
    <body>
    <div>
        @include('layouts.partials.nav')
  <div>
      <div class="row ">
          <div class="col s12 m8">
              <div class="card sections" style="width:100%">
                  @include('users.partials.cover')
                  <div class="card-action" style="overflow:hidden; padding:0px">
                      <div class="col s12 nav-extended">
                          <ul class="tabs tabs-transparent">
                              <li class="tab"><a  class="active" href="#test1">
                                  <span class="profile-menu-icon">
                                   About
                                </span></a>
                            </li>
                              <li class="tab"><a href="#test2"><span class="profile-menu-icon">
                                   Posts
                              </span></a></li>
                              <li class="tab"><a href="#test3"><span class="profile-menu-icon">
                                   Photos
                              </span></a></li>
                              <li class="tab"><a href="#test4"><span class="profile-menu-icon">
                                   More
                              </span></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col s12" style="padding:0px">
                      <div id="test1" class="small-block-grid-2 medium-block-grid-4 large-block-grid-6">
                          <div class="col s12 m6">
                              @include('users.partials.story')
                          </div>
                          <div class="col s12 m6">
                              @include('users.partials.work')
                              @include('users.partials.likes')
                          </div>
                      </div>
                      <div id="test2" class="col s12">
                          <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 45% }'>
                              @include('users.partials.post')
                          </div>
                      </div>
                      <div id="test3" class="col s12">Test 3</div>
                      <div id="test4" class="col s12">Test 4</div>
                  </div>

          </div>
      </div>
      <div class="col s4 m3 hide-on-small-only">
          @include('feed.partials.followcard')
      </div>


      </div>
  </div>
  </div>

</body>
@endsection
