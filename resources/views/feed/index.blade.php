@extends('layouts.default')

@section('content')
    <body>
        <div>
            @include('layouts.partials.nav')
            <meta name="csrf-token" content="{{ csrf_token()}}">
            <div class="mycontainer">
                <div class="row">
                    <div class="col m3 s12  hide-on-small-only">
                        @include('feed.partials.userview')
                    </div>
                    <div class="col m5 s12 feedsection"
                    {{-- data-feedcount="{!! $feedCount !!}" --}}
                    >

                        @include('feed.partials.feedpost')
                        <div id="loader"></div>
                        <div class="feeds-display">
                          @include('feed.partials.feeds')
                        </div>

                    </div>
                    <div class="col m3 s4  hide-on-small-only">
                        @include('feed.partials.followcard')
                    </div>
                </div>
            </div>
        </div>
        @include('feed.partials.commendSection')
    </body>
    @include('layouts.partials.scripts')

@endsection
