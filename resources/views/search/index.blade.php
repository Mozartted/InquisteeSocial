@extends('layouts.default')
@section('content')
    <body>
        <div>
        @include('layouts.partials.nav')
      <div>
          <div class="row">
              <div class="col s12 m3 hide-on-small-only">
                  @include('feed.partials.userview')
              </div>
              <div class="col s12 m5">
                  <div class="card sections min-margin">

                      <div class="card-content">
                          <div class="col s12 search-form">
                              <form>
                                  <div class="col s12" id="profile">
                                      <div class="input-field">

                                          <input id="searchh" type="text" name="search-term" />
                                          <label for="searchh">
                                              Enter Your Search Term
                                          </label>
                                      </div>


                                  </div>
                                  <div class="divider"></div>
                                  <div class="col s12">
                                      <button class="btn btn-floating right">
                                          <span><i class="material-icons">search</i></span>
                                      </button>
                                  </div>
                             </form>

                          </div>
                      </div>
                  </div>
                  <div class="card sections min-margin">
                      <div class="col s12 nav-extended">
                          <ul class="tabs tabs-transparent">
                              <li class="tab"><a  class="active" href="#people">
                                  <span class="profile-menu-icon">
                                   People
                                </span></a>
                            </li>
                              <li class="tab"><a href="#posts"><span class="profile-menu-icon">
                                   Posts
                              </span></a></li>

                          </ul>
                      </div>

                  </div>
                  <div class="card sections">
                      <div class="" id="people">
                          @include('search.partials.searchuser')
                      </div>
                      <div class="" id="posts">
                          @include('search.partials.searchpost')
                      </div>
                  </div>

              </div>
              <div class="col s4 m3 hide-on-small-only">
                  @include('layouts.partials.footer')

                  </div>
              </div>


          </div>
      </div>
    </div>
    </body>

@endsection
