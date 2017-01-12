@extends('layouts.default')
@section('content')
    @include('messages.partials.style')
    <body>
        <div>
          @include('layouts.partials.nav')
      <div>
          <div class="row">
            <meta name="csrf-token" content="{{ csrf_token()}}">
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
                            <!--This section would detail each user according to their responder order-->
                            @include('messages.partials.sidetab')
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
                              <textarea id="messageBox" class="materialize-textarea"></textarea>
                              <input type="hidden" class="currentresponder" value="{{ $recentUser }}" />
                              <label for="textarea1">Chat box type your fill</label>
                          </div>
                          <div class="col s12">
                            <button id="sendMessage" class="white-text red"><span><icon class="material-icons">send</icon>Send</span></button>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="col s4 m3 hide-on-small-only">
                  @include('messages.partials.followusers')
              </div>
              </div>


          </div>
      </div>
    </div>
    </body>
    @include('layouts.partials.scripts')
@endsection
