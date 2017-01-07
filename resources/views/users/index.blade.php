@extends('layouts.default')



@section('content')
    <body>
        <div>
            @include('layouts.partials.nav')
      <div class="mycontainer">
        @include('layouts.partials.alert')
          <div class="row ">
              <div class="col s12 m9">
                    @include('users.partials.cover')
                      <div class="col s12" style="padding:0px">
                          <div id="test1" class="small-block-grid-2 medium-block-grid-4 large-block-grid-6">
                              <div class="col s12 m4 ">
                                  @include('users.partials.intro')
                              </div>
                              <div class="col s12 m7 ">


                                  <div class="card sections top-card-border-yellow">
                                      <div class="card-title" style="padding:12px;">
                                          <span style="font-weight: light">Timeline</span>
                                      </div>
                                      <div class="card-content">
                                          <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 45% }'>
                                              @include('users.partials.timeline')
                                          </div>

                                      </div>
                                  </div>

                          </div>
                      </div>
                    <div id="test2" class="col s12">
                        <div class="col s12">
                            <div class="card sections">
                                <div class="card-header grey darken-3 white-text padding-5">
                                    <div class="card-title"><span>About</span></div>
                                </div>
                                <div class="card-content">
                                    <div class="col s3" style="border-right:#e3e3e3 1px solid">
                                        <div class="tabbed collective">
                                            <div data-tab="overview " class="collection-item active">Overview</div>
                                            <div data-tab="education" class="collection-item">Education</div>
                                            <div data-tab="opinions" class="collection-item">Opinions</div>
                                        </div>
                                    </div>
                                    <div class="col s9">
                                        <div class="tab-content active" id="overview">
                                            @include('users.partials.overview')
                                        </div>
                                        <div class="tab-content" id="opinions">
                                            @include('users.partials.opinions')
                                        </div>
                                        <div class="tab-content" id="education">
                                            @include('users.partials.education')

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card sections">
                                @include('users.partials.pics')
                            </div>
                            <div class="card sections">
                                <div class="card-header red darken-3 white-text padding-5">
                                    <div class="card-title"><span>Movies</span></div>
                                </div>
                                <div class="card-content">
                                    <div class="col s12" style="border-right:#e3e3e3 1px solid">
                                        <div class="tabbed collective">
                                            <div data-tab="overview " class="collection-item active">Teminator</div>
                                            <div data-tab="education" class="collection-item">Love Trone</div>
                                            <div data-tab="opinions" class="collection-item">Implications</div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="col s12" id="test3">

                      <div class="col s12">
                        <div class="card sections">
                          <div class="card-header grey darken-3 white-text padding-5">
                              <div class="card-title"><span>Followers</span></div>
                          </div>
                          <div class="card-content">
                            @include('users.partials.followers')
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col s12" id="test4">

                      <div class="col s12">
                        <div class="card sections">
                          <div class="card-header grey darken-3 white-text padding-5">
                              <div class="card-title"><span>Following</span></div>
                          </div>
                          <div class="card-content">
                            @include('users.partials.leaders')
                          </div>
                        </div>
                      </div>

                    </div>

                      </div>

              </div>
              <div class="col s4 m3 hide-on-small-only">
                  @include('feed.partials.followcard')
              </div>
              </div>

          </div>
      </div>

      </div>
    </div>
    @include('users.partials.editmodal')
    @include('users.partials.messagemodal')
    </body>
    @include('layouts.partials.scripts')

@endsection
