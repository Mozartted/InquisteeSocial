@extends('layout.default')
@section('content')
    @include('messages.partials.style')
    <body>
        <div>
        <nav class="nav-wrapper">

            <div class="nav-wrapper red darken-1">

                                <ul class="left">
                                    <li class="nav-notifying">
                                        <a href="https://twitter.com/">

                                            <span class="text"><i class="material-icons">home</i></span>
                                        </a>
                                    </li>
                                    <li  class="nav-notifying">
                                        <a href="https://twitter.com/">
                                            <span class="text"><i class="material-icons">notifications</i></span>
                                        </a>
                                    </li>
                                    <li class="nav-notifying">
                                        <a href="https://twitter.com/">
                                            <span class="text"><i class="material-icons">message</i></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="log-section input-field right">
                                    <div class="log-image row">
                                        <div class="col s2"><img class="circle" src="images/profile/myAvatar.png"/></div>
                                        <div class="col s10 center-align"><span>Mozartted</span></div>

                                    </div>
                                </div>
                <div class="input-field right">
                    <input id="search" type="search" required>
                    <label for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>

                <a href="#" class="brand-logo center">Lovenote</a>


            </div>
      </nav>
      <div>
          <div class="row">
              <div class="col s12 m3 hide-on-small-only">
                  <div class="card sections" style="overflow:hidden">
                      <div class="card-header">
                          <div class="header header-title" >
                              <span class="header_medium color-grey">Messages</span>
                              <p><small class="color-grey">Users your currently chatting with</small></p>
                          </div>
                      </div>
                      <div>
                          <div class="col s12 collection tabbed">
                              <div class="collection-item avatar" data-tab="tab-1">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Mozart</span>

                              </div>
                              <div class="collection-item avatar active" data-tab="tab-2">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Mozart</span>

                              </div>
                              <div class="collection-item avatar" data-tab="tab-3">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Mozart</span>

                              </div>
                              <div class="collection-item avatar" data-tab="tab-4">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Mozart</span>

                              </div>
                              <div class="collection-item avatar" data-tab="tab-5">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Title</span>

                              </div>
                              <div class="collection-item avatar" data-tab="tab-6">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Title</span>

                              </div>
                              <div class="collection-item avatar" data-tab="tab-7">
                                  <img src="images/profile/myAvatar.png" alt="" class="circle">
                                  <span class="title">Title</span>

                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="card sections col s12 m5">
                  <div>
                      <div class="header" style="padding:12px" >
                          <span class="header_medium color-grey">Messages</span>
                          <p><small class="color-grey">Users your currently chatting with</small></p>
                      </div>
                  </div>
                  <div class="divider"></div>
                  @include('messages.partials.messageuser')
                  <div class="divider"></div>
                  <div class="card-action" style="padding:12px;">
                      <div class="row">
                          <div class="input-field col s12">
                              <textarea id="textarea1" class="materialize-textarea"></textarea>
                              <label for="textarea1">Chat box type your fill</label>
                          </div>
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
