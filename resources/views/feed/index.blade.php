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
                        @include('feed.partials.feedpost')
                        @include('feed.partials.feeds')
                    </div>
                    <div class="col s4 m3 hide-on-small-only">
                        @include('feed.partials.followcard')
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection
