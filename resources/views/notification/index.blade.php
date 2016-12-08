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

                        @include('notification.partials.notifyhead')

                          <div class="" id="notification">
                              <div class="card sections min-margin">
                                 @include('notification.partials.notifycard')

                              </div>

                          </div>
                          <div class="" id="questions">
                              <div class="card sections min-margin">
                                  @include('notification.partials.questioncard')
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
