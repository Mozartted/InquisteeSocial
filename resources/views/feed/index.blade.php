@extends('layouts.default')

@section('content')
    <body>
        <div>
            @include('layouts.partials.nav')
            <meta name="csrf-token" content="{{ csrf_token()}}">
            <div class="mycontainer">
                <div class="row">
                    <div class="col s12 m3 hide-on-small-only">
                        @include('feed.partials.userview')
                    </div>
                    <div class="col s12 m5">
                        @include('feed.partials.feedpost')
                        @include('feed.partials.feeds')
                    </div>
                    <div class="col s4 m3 hide-on-small-only">
                        @include('feed.partials.followcard')
                    </div>
                </div>
            </div>
        </div>
        @include('feed.partials.commendSection')
    </body>
    @include('layouts.partials.scripts')

@endsection
